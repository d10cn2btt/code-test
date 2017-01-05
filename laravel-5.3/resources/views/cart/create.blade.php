@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Cart</h3>
        </div>
        {!! Form::open(['url' => route('cart.store')])  !!}
        @include('partials.form.cart')
        {!! Form::close() !!}
    </div>
@endsection
