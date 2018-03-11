<table class="table table-responsive" id="tasks-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Note</th>
        <th>Status Id</th>
        <th>User Id</th>
        <th>Project Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Completed On</th>
        <th>Deleted By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $task->name !!}</td>
            <td>{!! $task->description !!}</td>
            <td>{!! $task->note !!}</td>
            <td>{!! $task->status_id !!}</td>
            <td>{!! $task->user_id !!}</td>
            <td>{!! $task->project_id !!}</td>
            <td>{!! $task->start_date !!}</td>
            <td>{!! $task->end_date !!}</td>
            <td>{!! $task->completed_on !!}</td>
            <td>{!! $task->deleted_by !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>