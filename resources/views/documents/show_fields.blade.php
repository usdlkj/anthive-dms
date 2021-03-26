@foreach ($projectFields as $field)

@foreach ($documentFields as $docField)

@if ($field->field_code == $docField->field_code)

<div class="form-group col-sm-6">
    <label for="field">{{$field->field_text}}</label>
@if ($field->field_type == \App\Models\ProjectField::FIELD_SHORT_TEXT)
    <input type="text" name="{{$field->field_code}}" class="form-control" value="{{$docField->field_value}}" disabled>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_TEXT)
    <input type="text" name="{{$field->field_code}}" class="form-control" value="{{$docField->field_value}}" disabled>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_TEXT_AREA)
    <textarea name="{{$field->field_code}}" class="form-control" disabled>{{$docField->field_value}}</textarea>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_DATE)
    <input type="date" name="{{$field->field_code}}" class="form-control" value="{{$docField->field_value}}" disabled>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_SINGLE_SELECT)
    <select name="{{$field->field_code}}" class="form-control" disabled>
    @foreach ($selectValues as $selectValue)
    @if ($field->id == $selectValue->project_field_id)
        <option value="{{$selectValue->id}}" 
        @if ($selectValue->id == $docField->fieldValue)
        selected
        @endif
        >{{$selectValue->value_text}}</option>
    @endif
    @endforeach
    </select>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_MULTI_SELECT)
    <select name="{{$field->field_code}}" class="form-control" disabled>
    @foreach ($selectValues as $selectValue)
    @if ($field->id == $selectValue->project_field_id)
        <option value="{{$selectValue->id}}"
        @if ($selectValue->id == $docField->fieldValue)
        selected
        @endif
        >{{$selectValue->value_text}}</option>
    @endif
    @endforeach
    </select>
@endif

</div>

@endif

@endforeach

@endforeach