<div class="table-responsive">
    <table class="table" id="mailUsers-table">
        <thead>
            <tr>
                <th>Mail Id</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mailUsers as $mailUser)
            <tr>
                       <td>{{ $mailUser->mail_id }}</td>
            <td>{{ $mailUser->user_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['mailUsers.destroy', $mailUser->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('mailUsers.show', [$mailUser->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('mailUsers.edit', [$mailUser->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
