@extends('layouts.app')
@section('titlePage', 'Sort Category')
@section('content')
    <div class="row sort-category">
        <div class="col-md-4 cate25">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Level 2.5</h3></div>
                <ul class="list-group sortable-cate" id="cate25-sortable">
                    @foreach($listL25 as $l25)
                        <li onclick="getCate3({{$l25->id}}, this)" class="list-group-item">
                            {{$l25->id}}. {{$l25->name}} - {{$l25->priority}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4 cate3">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Level 3</h3></div>
                    <ul class="list-group sortable-cate" id="cate3-sortable"></ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 cate35">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Level 3.5</h3></div>
                <ul class="list-group"></ul>
            </div>
        </div>
    </div>

    <div class="router-list">
        {!! Form::hidden('get-catel3', route('get.catel3', ''), ['id' => 'route-get-catel3']) !!}
        {!! Form::hidden('get-catel35', route('get.catel35', ''), ['id' => 'route-get-catel35']) !!}
    </div>
@endsection

@push('script-file')
<script src="{{url('/plugins/sortable/Sortable.js')}}"></script>
<script src="{{url('/js/sort_category.js')}}"></script>
@endpush