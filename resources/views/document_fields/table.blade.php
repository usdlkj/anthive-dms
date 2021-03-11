<div class="table-responsive">
    <table class="table" id="documentFields-table">
        <thead>
            <tr>
                <th>Document Id</th>
        <th>Field Code</th>
        <th>Field Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documentFields as $documentField)
            <tr>
                       <td>{{ $documentField->document_id }}</td>
            <td>{{ $documentField->field_code }}</td>
            <td>{{ $documentField->field_value }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['documentFields.destroy', $documentField->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('documentFields.show', [$documentField->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('documentFields.edit', [$documentField->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
