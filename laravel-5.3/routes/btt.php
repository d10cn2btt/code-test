<?php
/**
 * Created by PhpStorm.
 * User: truongbt
 * Date: 28/01/2017
 * Time: 23:58
 */

class Baz{}

class Bar {
    public $baz;

    public function __construct(Baz $baz)
    {
        $this->baz = $baz;
    }
}

Route::get('servicecontainer', function () {
    dd(app('Bar'));
});

//App::bind('Bar', function () {
//    return new Bar(new Baz());
//});



interface BarInterface{}

class Btt implements BarInterface{}

Route::get('servicecontainer2', function (BarInterface $barIn) {
    $barIn2 = app('Btt111');
    dd($barIn2);

    dd($barIn);
});

//App::bind('BarInterface', function () {
//    return new Btt;
//});

App::bind('BarInterface', 'Btt');

App::bind('Btt111', function () {
    return '13123123';
    return new Btt;
});


Route::get('/foo', 'FooController@foo');