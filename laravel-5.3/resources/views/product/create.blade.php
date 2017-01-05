@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Product</h3>
        </div>
        {!! Form::open(['url' => route('product.store')])  !!}
        @include('partials.form.product')
        {!! Form::close() !!}
    </div>
@endsection
