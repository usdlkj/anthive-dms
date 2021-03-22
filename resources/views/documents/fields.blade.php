@foreach ($projectFields as $field)

<div class="form-group col-sm-6">
    <label for="field">{{$field->field_text}}</label>
@if ($field->field_type == \App\Models\ProjectField::FIELD_SHORT_TEXT)
    <input type="text" name="{{$field->field_code}}" class="form-control">
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_TEXT)
    <input type="text" name="{{$field->field_code}}" class="form-control">
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_TEXT_AREA)
    <textarea name="{{$field->field_code}}"></textarea>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_DATE)
    <input type="date" name="{{$field->field_code}}" class="form-control">
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_SINGLE_SELECT)
    <select name="{{$field->field_code}}" class="form-control">
    @foreach ($selectValues as $selectValue)
    @if ($field->id == $selectValue->project_field_id)
        <option value="{{$selectValue->id}}">{{$selectValue->value_text}}</option>
    @endif
    @endforeach
    </select>
@elseif ($field->field_type == \App\Models\ProjectField::FIELD_MULTI_SELECT)
    <select name="{{$field->field_code}}" class="form-control">
    @foreach ($selectValues as $selectValue)
    @if ($field->id == $selectValue->project_field_id)
        <option value="{{$selectValue->id}}">{{$selectValue->value_text}}</option>
    @endif
    @endforeach
    </select>
@endif

</div>


@endforeach