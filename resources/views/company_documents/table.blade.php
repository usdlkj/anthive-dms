<div class="table-responsive">
    <table class="table" id="companyDocuments-table">
        <thead>
            <tr>
                <th>Company Id</th>
        <th>Document Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companyDocuments as $companyDocument)
            <tr>
                       <td>{{ $companyDocument->company_id }}</td>
            <td>{{ $companyDocument->document_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['companyDocuments.destroy', $companyDocument->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('companyDocuments.show', [$companyDocument->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('companyDocuments.edit', [$companyDocument->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
