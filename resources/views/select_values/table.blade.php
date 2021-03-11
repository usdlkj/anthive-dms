<div class="table-responsive">
    <table class="table" id="selectValues-table">
        <thead>
            <tr>
                <th>Project Field Id</th>
        <th>Value Code</th>
        <th>Value Text</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($selectValues as $selectValue)
            <tr>
                       <td>{{ $selectValue->project_field_id }}</td>
            <td>{{ $selectValue->value_code }}</td>
            <td>{{ $selectValue->value_text }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['selectValues.destroy', $selectValue->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('selectValues.show', [$selectValue->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('selectValues.edit', [$selectValue->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
