<div class="table-responsive">
    <table class="table" id="projectUsers-table">
        <thead>
            <tr>
                <th>Project Id</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projectUsers as $projectUser)
            <tr>
                       <td>{{ $projectUser->project_id }}</td>
            <td>{{ $projectUser->user_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['projectUsers.destroy', $projectUser->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('projectUsers.show', [$projectUser->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('projectUsers.edit', [$projectUser->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
