<div class="box-body">
    <div class="form-group <?php if ($errors->has('name')):?> has-error <?php endif; ?>">
        {!! Form::label('name', 'Product Name *') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}

        {!! Form::label('price', 'Price *') !!}
        {!! Form::number('price', null, array('class' => 'form-control')) !!}

        {!! Form::label('product_code', 'Product Code *') !!}
        {!! Form::text('product_code', null, array('class' => 'form-control')) !!}

        {!! Form::label('cates', 'Category *') !!}
        {!! Form::select('cates[]', $cates, null, array('class' => 'form-control select2', 'multiple' => 'multiple')) !!}

        <?php if ($errors->has('name')):?><span class="help-block"><?php echo $errors->first('name') ?></span><?php endif; ?>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

@push('css-file')
<link rel="stylesheet" href="{{ url('/css/select2.min.css') }}">
@endpush