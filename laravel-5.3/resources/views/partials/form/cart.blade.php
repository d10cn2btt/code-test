<div class="box-body">
    <div class="form-group <?php if ($errors->has('name')):?> has-error <?php endif; ?>">
        {!! Form::label('name', 'Cart Name *') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
        <?php if ($errors->has('name')):?><span class="help-block"><?php echo $errors->first('name') ?></span><?php endif; ?>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>