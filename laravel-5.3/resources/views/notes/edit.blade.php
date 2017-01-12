@extends('layouts.app')
@section('titlePage', trans('admin.notes.pages.edit'))
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($note, array('url' => route('notes.update', $note->id), 'method' => 'PUT')) !!}
            @include('_partials.forms.notes')
            {!! Form::close() !!}
        </div>
    </div>
@endsection