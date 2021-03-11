<div class="table-responsive">
    <table class="table" id="projectFields-table">
        <thead>
            <tr>
                <th>Project Id</th>
        <th>Field Code</th>
        <th>Field Type</th>
        <th>Field Text</th>
        <th>Visible</th>
        <th>Mandatory</th>
        <th>Sequence</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projectFields as $projectField)
            <tr>
                       <td>{{ $projectField->project_id }}</td>
            <td>{{ $projectField->field_code }}</td>
            <td>{{ $projectField->field_type }}</td>
            <td>{{ $projectField->field_text }}</td>
            <td>{{ $projectField->visible }}</td>
            <td>{{ $projectField->mandatory }}</td>
            <td>{{ $projectField->sequence }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['projectFields.destroy', $projectField->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('projectFields.show', [$projectField->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('projectFields.edit', [$projectField->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
