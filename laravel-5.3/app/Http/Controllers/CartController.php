<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cart.index');
	}

    public function cartIndexData()
    {
        $carts = Cart::with('category')->select(['id', 'name', 'created_at', 'updated_at']);

        $dataTable = render_datatable($carts, false, true, true, true);

        $dataTable->addColumn('catename', function ($model) {
            return $model->category->map(function ($category) {
                return str_limit($category->name, 30, '...');
            })->implode('<br>');
        });

        return $dataTable->make(true);

        return render_datatable($carts, false);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cart.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CartRequest $request)
	{
        DB::beginTransaction();
        try {
            if (Cart::saveCart($request)) {
                DB::commit();
                Flash::success('admin.msg.create.success');
                return redirect()->route('cart.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.create.fail');
            return redirect()->route('cart.index');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $cart = Cart::findOrFail($id);
        return view('cart.edit', array(
            'cart' => $cart
        ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\CartRequest $request, $id)
	{
        DB::beginTransaction();
        try {
            if (Cart::saveCart($request, $id)) {
                DB::commit();
                Flash::success('admin.msg.update.success');
                return redirect()->route('cart.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.update.fail');
            return redirect()->route('cart.index');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $cart = Cart::find($id);
        foreach ($cart->category as $cate) {
            $cate->product()->detach();
        }
        $cart->category()->delete();

        if ($cart->delete()) {
            return json_encode(
                array(
                    'status' => RESPONSE_SUCCESS,
                    'msg' => trans('admin.msg.delete.success'),
                )
            );
        }

        return json_encode(
            array(
                'status' => RESPONSE_ERROR,
                'msg' => trans('admin.msg.delete.fail'),
            )
        );
	}

}
