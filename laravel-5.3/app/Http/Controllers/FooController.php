<?php

namespace App\Http\Controllers;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller
{
    private $repository;

    public function __construct(FooRepository $repository)
    {
        $this->repository = $repository;
    }

    public function foo()
    {
        $this->hashExampleServiceProvider();
        return $this->repository->get();
    }

    public function hashExampleServiceProvider()
    {
        $hash = app('hash');
        $pass = $hash->make('btt');
        if ($hash->check('btt', $pass)) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }
}
