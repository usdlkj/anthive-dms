<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
            <tr>
                <th>Company Name</th>
        <th>Trading Name</th>
        <th>Company Code</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                       <td>{{ $company->company_name }}</td>
            <td>{{ $company->trading_name }}</td>
            <td>{{ $company->company_code }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('companies.show', [$company->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('companies.edit', [$company->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
