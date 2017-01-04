<div class="box-body">
    <div class="form-group <?php if ($errors->has('name')):?> has-error <?php endif; ?>">
        {!! Form::label('name', 'Category Name *') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}

        {!! Form::label('cart_id', 'Cart Name *') !!}
        {!! Form::select('cart_id', $carts, null, array('class' => 'form-control select2')) !!}

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