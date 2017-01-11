@section('content')
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    {!! $dataTable->table([
                        'class' => 'table table-striped table-hover dataTable',
                        'style' => 'width: 100%',
                    ], true) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-file')
<script src="{{url('/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{url('/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script src="{{url('/plugins/dataTables/buttons.server-side.js')}}"></script>

<script src="{{url('/plugins/dataTables/extensions/Buttons/js/dataTables.buttons.js')}}"></script>
<script src="{{url('/plugins/dataTables/extensions/Buttons/js/buttons.bootstrap.js')}}"></script>
<script src="{{url('/plugins/dataTables/extensions/Buttons/js/buttons.html5.js')}}"></script>
<script src="{{url('/plugins/dataTables/extensions/Buttons/js/buttons.flash.js')}}"></script>

<script src="{{url('/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('/plugins/select2/select2.full.min.js')}}"></script>
{!! $dataTable->scripts() !!}
@endpush

@push('css-file')
<link rel="stylesheet" href="{{url('/plugins/dataTables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{url('/plugins/datepicker/css/bootstrap-datepicker.min.css') }}">

<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css') }}">
@endpush