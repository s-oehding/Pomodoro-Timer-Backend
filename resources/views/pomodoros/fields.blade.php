<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_id', 'Task Id:') !!}
    {!! Form::number('task_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::number('project_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::date('start', null, ['class' => 'form-control']) !!}
</div>

<!-- End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end', 'End:') !!}
    {!! Form::date('end', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_by', 'Deleted By:') !!}
    {!! Form::number('deleted_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pomodoros.index') !!}" class="btn btn-default">Cancel</a>
</div>
