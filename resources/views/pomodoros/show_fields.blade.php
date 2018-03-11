<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pomodoro->id !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $pomodoro->status_id !!}</p>
</div>

<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $pomodoro->task_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $pomodoro->user_id !!}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{!! $pomodoro->project_id !!}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{!! $pomodoro->start !!}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{!! $pomodoro->end !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pomodoro->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pomodoro->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $pomodoro->deleted_at !!}</p>
</div>

<!-- Deleted By Field -->
<div class="form-group">
    {!! Form::label('deleted_by', 'Deleted By:') !!}
    <p>{!! $pomodoro->deleted_by !!}</p>
</div>

