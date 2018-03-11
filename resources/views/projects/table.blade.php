<table class="table table-responsive" id="projects-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Note</th>
        <th>Client Id</th>
        <th>Status Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Created By</th>
        <th>Deleted By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->name !!}</td>
            <td>{!! $project->description !!}</td>
            <td>{!! $project->note !!}</td>
            <td>{!! $project->client_id !!}</td>
            <td>{!! $project->status_id !!}</td>
            <td>{!! $project->start_date !!}</td>
            <td>{!! $project->end_date !!}</td>
            <td>{!! $project->created_by !!}</td>
            <td>{!! $project->deleted_by !!}</td>
            <td>
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>