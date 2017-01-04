<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;

class ProductController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('product.index');
	}

    public function productIndexData(Request $request)
    {
        $products = Product::with('category')->select('tbl_product.*');

        $dataTable = render_datatable($products, false, true, true, true);

        $dataTable->addColumn('catename', function ($model) {
            return $model->category->map(function ($category) {
                return str_limit($category->name, 30, '...');
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
        $cates = array_pluck(Category::all()->toArray(), 'name', 'id');
		return view('product.create', array(
		    'cates' => $cates
        ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\ProductRequest $request)
	{
        DB::beginTransaction();
        try {
            if (Product::saveProduct($request)) {
                DB::commit();
                Flash::success('admin.msg.create.success');
                return redirect()->route('product.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.create.fail');
            return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        $cateSelected = array();
        foreach ($product->category as $item) {
            $cateSelected[] = $item->id;
        };

        $product->cates = $cateSelected;
        $cates = array_pluck(Category::all()->toArray(), 'name', 'id');

        return view('product.edit', array(
            'product' => $product,
            'cates' => $cates
        ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\ProductRequest $request, $id)
	{
        DB::beginTransaction();
        try {
            if (Product::saveProduct($request, $id)) {
                DB::commit();
                Flash::success('admin.msg.update.success');
                return redirect()->route('product.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.update.fail');
            return redirect()->route('product.index');
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
        $product = Product::find($id);
        $product->category()->detach();
        if ($product->delete()) {
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

	public function export()
    {
        $data = Product::all()->toArray();
        Excel::create('listProduct', function ($excel) use ($data) {
            $excel->sheet('productSheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->store('csv');
    }
}
