@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Cart</h3>
        </div>
        {!! Form::model($cart, ['url' => route('cart.update', array($cart->id)), 'method' => 'put']) !!}
        @include('partials.form.cart')
        {!! Form::close() !!}
    </div>
@endsection
