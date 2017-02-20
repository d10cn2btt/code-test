<div class="form-group @if ($errors->has('title')) has-error @endif">
    <label class="form-label" for="title">{{trans('admin.notes.fields.title')}}<span class="required"> *</span></label>
    {!! Form::text('title', null, array('class' => 'form-control', 'id' => 'title', 'maxlength' => 255)) !!}
    @if ($errors->has('title'))<span class="help-block">{{ $errors->first('title') }}</span>@endif
</div>
<div class="form-group @if ($errors->has('body')) has-error @endif">
    <label class="form-label" for="title">{{trans('admin.notes.fields.body')}}</label>
    {!! Form::textarea('body', null, array('id' => 'body')) !!}
    @if ($errors->has('body'))<span class="help-block">{{ $errors->first('body') }}</span>@endif
</div>
<div class="form-group @if ($errors->has('status')) has-error @endif">
    {!! Form::label('status', trans('admin.notes.fields.status'), array('class' => 'form-label')) !!}
    {!! Form::select('status', $status, null, array('class' => 'select2', 'style' => 'width: 100%', 'id' => 'status')) !!}
    <span class="help-block" id="error_task"></span>
</div>
<div class="form-group">
    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
</div>

@push('script-file')
<script src="{{url('/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'body' );
    $(".select2").select2();
</script>
@endpush

@push('css-file')
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">
@endpush