@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Category</h3>
        </div>
        {!! Form::open(['url' => route('category.store')])  !!}
        @include('partials.form.category')
        {!! Form::close() !!}
    </div>
@endsection
