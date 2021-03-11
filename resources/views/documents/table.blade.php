<div class="table-responsive">
    <table class="table" id="documents-table">
        <thead>
            <tr>
                <th>Document Code</th>
        <th>Project Id</th>
        <th>File Id</th>
        <th>Version</th>
        <th>Latest Version</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                       <td>{{ $document->document_code }}</td>
            <td>{{ $document->project_id }}</td>
            <td>{{ $document->file_id }}</td>
            <td>{{ $document->version }}</td>
            <td>{{ $document->latest_version }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('documents.show', [$document->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('documents.edit', [$document->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
