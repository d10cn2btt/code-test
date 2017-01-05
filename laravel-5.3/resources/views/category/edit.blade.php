@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Category</h3>
        </div>
        {!! Form::model($category, ['url' => route('category.update', array($category->id)), 'method' => 'put']) !!}
        @include('partials.form.category')
        {!! Form::close() !!}
    </div>
@endsection
