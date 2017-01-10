@extends('layouts.app')

@section('content')
    <div class="box box-primary">
        <div class="box-header"><h3 class="box-title">Create Notes</h3></div>
        <div class="box-body">
            {!! Form::open(array('url' => route('notes.store'))) !!}
            @include('partials.forms.notes')
            {!! Form::close() !!}
        </div>
    </div>
@endsection