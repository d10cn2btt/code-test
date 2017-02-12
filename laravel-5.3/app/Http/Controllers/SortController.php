<?php
/**
 * Created by PhpStorm.
 * User: truongbt
 * Date: 12/02/2017
 * Time: 17:02
 */

namespace App\Http\Controllers;


use App\Models\L25;
use App\Repositories\L25Repository;

class SortController extends Controller
{
    protected $l25Repository;

    public function __construct(L25Repository $l25Repository)
    {
        $this->l25Repository = $l25Repository;
    }

    public function index()
    {
        $listL25 = L25::priority()->get();
        return view('sort.index', compact('listL25'));
    }
}