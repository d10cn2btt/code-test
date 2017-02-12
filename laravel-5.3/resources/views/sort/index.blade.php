@extends('layouts.app')
@section('titlePage', 'Sort Category')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Level 2.5</h3></div>
                <ul class="list-group">
                    @foreach($listL25 as $l25)
                        <li class="list-group-item">{{$l25->id}}. {{$l25->name}} - {{$l25->priority}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Level 3</h3></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Level 3.5</h3></div>
            </div>
        </div>
    </div>
@endsection