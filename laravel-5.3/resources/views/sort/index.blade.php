@extends('layouts.app')
@section('titlePage', 'Sort Category')
@section('content')
    <div class="row sort-category">
        <div class="col-md-4 cate25">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Level 2.5</h3></div>
                <ul class="list-group sortable-cate" id="cate25_sortable">
                    @php
                    $cate25Ids = json_encode(array_pluck($listL25, 'id'));
                    @endphp
                    @foreach($listL25 as $l25)
                        <li data-id="{{$l25->id}}" onclick="getCate3({{$l25->id}}, this)" class="list-group-item">
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
                    <ul class="list-group sortable-cate" id="cate3_sortable"></ul>
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
<script>
    {{--var cate25Order = {{$cate25Ids}}--}}
</script>
<script src="{{url('/js/sort_category.js')}}"></script>
@endpush