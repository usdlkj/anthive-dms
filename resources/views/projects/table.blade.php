<div class="table-responsive">
    <table class="table" id="projects-table">
        <thead>
            <tr>
                <th>Project Name</th>
        <th>Project Code</th>
        <th>Description</th>
        <th>Location</th>
        <th>City</th>
        <th>Country</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Project Value</th>
        <th>Project Owner Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->project_name }}</td>
            <td>{{ $project->project_code }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->location }}</td>
            <td>{{ $project->city }}</td>
            <td>{{ $project->country }}</td>
            <td>{{ $project->start_date }}</td>
            <td>{{ $project->end_date }}</td>
            <td>{{ $project->project_value }}</td>
            <td>{{ $project->project_owner_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('projects.show', [$project->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('projects.edit', [$project->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
