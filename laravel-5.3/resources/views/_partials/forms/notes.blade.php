<div class="form-group @if ($errors->has('title')) error-control @endif">
    <label class="form-label" for="title">{{trans('admin.notes.fields.title')}}<span class="required"> *</span></label>
    {!! Form::text('title', null, array('class' => 'form-control', 'id' => 'title', 'maxlength' => 255)) !!}
    @if ($errors->has('title'))<span class="error">{{ $errors->first('title') }}</span>@endif
</div>
<div class="form-group @if ($errors->has('body')) error-control @endif">
    <label class="form-label" for="title">{{trans('admin.notes.fields.body')}}</label>
    {!! Form::textarea('body', null, array('id' => 'body')) !!}
    @if ($errors->has('body'))<span class="error">{{ $errors->first('body') }}</span>@endif
</div>
<div class="form-group @if ($errors->has('status')) error-control @endif">
    {!! Form::label('status', trans('admin.notes.fields.status'), array('class' => 'form-label')) !!}
    {!! Form::select('status', $status, null, array('class' => 'select2', 'style' => 'width: 100%', 'id' => 'status')) !!}
    <span class="error" id="error_task"></span>
</div>

@push('script-file')
<script src="{{url('/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>
@endpush

@push('css-file')
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">
@endpush