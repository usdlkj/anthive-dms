<div class="table-responsive">
    <table class="table" id="mailTypes-table">
        <thead>
            <tr>
                <th>Project Id</th>
        <th>Mail Type</th>
        <th>Mail Type Code</th>
        <th>Last Mail Number</th>
        <th>Is Transmittal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mailTypes as $mailType)
            <tr>
                       <td>{{ $mailType->project_id }}</td>
            <td>{{ $mailType->mail_type }}</td>
            <td>{{ $mailType->mail_type_code }}</td>
            <td>{{ $mailType->last_mail_number }}</td>
            <td>{{ $mailType->is_transmittal }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['mailTypes.destroy', $mailType->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('mailTypes.show', [$mailType->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('mailTypes.edit', [$mailType->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
