<div class="table-responsive">
    <table class="table" id="mailAttachments-table">
        <thead>
            <tr>
                <th>Mail Id</th>
        <th>Attachment Id</th>
        <th>Attachment Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mailAttachments as $mailAttachment)
            <tr>
                       <td>{{ $mailAttachment->mail_id }}</td>
            <td>{{ $mailAttachment->attachment_id }}</td>
            <td>{{ $mailAttachment->attachment_type }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['mailAttachments.destroy', $mailAttachment->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('mailAttachments.show', [$mailAttachment->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('mailAttachments.edit', [$mailAttachment->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
