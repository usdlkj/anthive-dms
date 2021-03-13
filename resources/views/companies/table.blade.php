<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
            <tr>
                <th>Company Name</th>
        <th>Trading Name</th>
        <th>Company Code</th>
        <th>Address</th>
        <th>City</th>
        <th>Post Code</th>
        <th>Country</th>
        <th>Phone Number</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->company_name }}</td>
            <td>{{ $company->trading_name }}</td>
            <td>{{ $company->company_code }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->city }}</td>
            <td>{{ $company->post_code }}</td>
            <td>{{ $company->country }}</td>
            <td>{{ $company->phone_number }}</td>
            <td>{{ $company->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$company->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('companies.edit', [$company->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
