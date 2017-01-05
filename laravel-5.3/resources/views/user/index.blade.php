@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    {!! $dataTable->table([
                        'class' => 'table table-striped table-hover dataTable',
                        'style' => 'width: 100%',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{url('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/vendor/datatables/dataTables.bootstrap.js')}}"></script>

<script src="{{url('/vendor/datatables/buttons.server-side.js')}}"></script>
<script src="{{url('/vendor/datatables/extensions/Buttons/js/dataTables.buttons.js')}}"></script>
<script src="{{url('/vendor/datatables/extensions/Buttons/js/buttons.bootstrap.js')}}"></script>
<script src="{{url('/vendor/datatables/extensions/Buttons/js/buttons.html5.js')}}"></script>
<script src="{{url('/vendor/datatables/extensions/Buttons/js/buttons.flash.js')}}"></script>
{!! $dataTable->scripts() !!}
@endpush

@push('css-file')
{{--<link rel="stylesheet" href="{{ url('/vendor/datatables/jquery.dataTables.min.css') }}">--}}
<link rel="stylesheet" href="{{ url('/vendor/datatables/dataTables.bootstrap.css') }}">
{{--<link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/datatables/dataTables.bootstrap.css">--}}
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush