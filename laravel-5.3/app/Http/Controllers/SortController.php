<?php
namespace App\Http\Controllers;
use App\Models\L25;
use App\Models\L3;
use App\Models\L35;
use App\Repositories\L25Repository;
use Illuminate\Http\Request;

class SortController extends Controller
{
    protected $l25Repository;

    /**
     * SortController constructor.
     *
     * @param L25Repository $l25Repository
     */
    public function __construct(L25Repository $l25Repository)
    {
        $this->l25Repository = $l25Repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $listL25 = L25::priority()->get();

        return view('sort.index', compact('listL25'));
    }

    /**
     * @param $idCateL25
     */
    public function getCateL3($idCateL25)
    {
        return L3::parent($idCateL25)->priority()->get()->toArray();
    }

    /**
     * @param $idCateL3
     */
    public function getCateL35(Request $request, $idCateL3)
    {
        dd($request->all());
        return L35::parent($idCateL3)->priority()->get()->toArray();
    }
}