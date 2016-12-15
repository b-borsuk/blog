<div class="form-group">
    {{ Form::label('title', _('Title'), ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-8">
        {{ Form::text('title', null, ['placeholder' => _('Title'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('slug', _('Slug'), ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-8">
        {{ Form::text('slug', null, ['placeholder' => _('Slug'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('short_description', _('Short Description'), ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-8">
        {{ Form::textarea('short_description', null, ['placeholder' => _('Short Description'), 'class' => 'form-control', 'rows' => '5']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', _('Description'), ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-8">
        {{ Form::textarea('description', null, ['placeholder' => _('Description'), 'class' => 'form-control', 'rows' => '9']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <div class="checkbox">
            <input type="hidden" name="is_active" value="0">

            <label>
                {{ Form::checkbox('is_active', 1, null) }}<i></i>
                {{ _('is active') }}
            </label>
        </div>
    </div>
</div>
