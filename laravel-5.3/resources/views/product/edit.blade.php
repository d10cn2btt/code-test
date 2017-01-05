@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Product</h3>
        </div>
        {!! Form::model($product, ['url' => route('product.update', array($product->id)), 'method' => 'put']) !!}
        @include('partials.form.product')
        {!! Form::close() !!}
    </div>
@endsection
