<div class="table-responsive">
    <table class="table" id="files-table">
        <thead>
            <tr>
                <th>File Name</th>
        <th>File Hash</th>
        <th>Location</th>
        <th>File Size</th>
        <th>Extension</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                       <td>{{ $file->file_name }}</td>
            <td>{{ $file->file_hash }}</td>
            <td>{{ $file->location }}</td>
            <td>{{ $file->file_size }}</td>
            <td>{{ $file->extension }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['files.destroy', $file->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('files.show', [$file->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('files.edit', [$file->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
