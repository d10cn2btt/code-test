<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('category.index');
	}

    public function cateIndexData(Request $request)
    {
        $categories = Category::with('product')->with('cart')->select('tbl_category.*');

        $dataTable = render_datatable($categories, false, true, true, true);

        $dataTable->addColumn('pdname', function ($model) {
            return $model->product->map(function ($product) {
                return str_limit($product->name, 30, '...');
            })->implode('<br>');
        });

        return $dataTable->make(true);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $carts = array_pluck(Cart::all()->toArray(), 'name', 'id');
		return view('category.create', array(
		    'carts' => $carts
        ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CategoryRequest $request)
	{
		DB::beginTransaction();
        try {
            if (Category::saveCate($request)) {
                DB::commit();
                Flash::success('admin.msg.create.success');
                return redirect()->route('category.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.create.fail');
            return redirect()->route('category.index');
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
	    $category = Category::findOrFail($id);
        $carts = array_pluck(Cart::all()->toArray(), 'name', 'id');

		return view('category.edit', array(
		    'category' => $category,
            'carts' => $carts
        ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\CategoryRequest $request, $id)
	{
        DB::beginTransaction();
        try {
            if (Category::saveCate($request, $id)) {
                DB::commit();
                Flash::success('admin.msg.update.success');
                return redirect()->route('category.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.update.fail');
            return redirect()->route('category.index');
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
        $category = Category::find($id);
        $category->product()->detach();
        if ($category->delete()) {
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
