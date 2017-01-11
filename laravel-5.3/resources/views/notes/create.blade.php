@extends('layouts.app')
@section('titlePage', trans('admin.notes.pages.create'))
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(array('url' => route('notes.store'))) !!}
            @include('_partials.forms.notes')
            {!! Form::close() !!}
        </div>
    </div>
@endsection