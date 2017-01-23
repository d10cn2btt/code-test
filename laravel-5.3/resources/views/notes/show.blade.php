@extends('layouts.app')
@section('titlePage', trans('admin.notes.pages.show'))
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            @foreach($notes as $n)
                {{$n->id}} : {{$n->title}} - {{$n->users->name}}<br>
            @endforeach
        </div>
    </div>
@endsection