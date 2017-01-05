@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-hover dataTable" id="dataTableBuilder">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ url('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/bootstrap-notify.min.js') }}"></script>
<script>
    $(function () {
        var dttb = $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('cart.index.data') !!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'catename', name: 'category.name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', "searchable": false, "orderable": false},
            ]
        });
    });
</script>
@endpush

@push('css-file')
<link rel="stylesheet" href="{{ url('/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ url('/css/animate.min.css') }}">