<div class="table-responsive">
    <table class="table" id="mails-table">
        <thead>
            <tr>
                <th>Thread Starter Id</th>
        <th>Previous Mail Id</th>
        <th>Mail Type Id</th>
        <th>Sender Id</th>
        <th>Mail Code</th>
        <th>Mail Status</th>
        <th>Subject</th>
        <th>Message</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mails as $mail)
            <tr>
                       <td>{{ $mail->thread_starter_id }}</td>
            <td>{{ $mail->previous_mail_id }}</td>
            <td>{{ $mail->mail_type_id }}</td>
            <td>{{ $mail->sender_id }}</td>
            <td>{{ $mail->mail_code }}</td>
            <td>{{ $mail->mail_status }}</td>
            <td>{{ $mail->subject }}</td>
            <td>{{ $mail->message }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['mails.destroy', $mail->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('mails.show', [$mail->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('mails.edit', [$mail->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
