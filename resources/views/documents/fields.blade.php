@foreach ($projectFields as $field)

<div class="form-group col-sm-6">
    <label for="field">{{$field->field_text}}</label>

<?php
$fieldValue = '';

if (isset($documentFields)) {
    foreach ($documentFields as $docField) {
        if ($field->field_code == $docField->field_code) {
            $fieldValue = $docField->field_value;
            break;
        }
    }
}
?>

@if ($field->field_type == \App\Models\ProjectField::FIELD_SHORT_TEXT ||
     $field->field_type == \App\Models\ProjectField::FIELD_TEXT ||
     $field->field_type == \App\Models\ProjectField::FIELD_DATE)

    <input type="text" name="{{$field->field_code}}" class="form-control"
    
    @if (isset($fieldValue))

    value="{{$fieldValue}}"

    @endif

     >

@elseif ($field->field_type == \App\Models\ProjectField::FIELD_TEXT_AREA)

    <textarea name="{{$field->field_code}}" class="form-control">
    
    @if (isset($fieldValue))

    {{$fieldValue}}

    @endif    
    
    </textarea>

@elseif ($field->field_type == \App\Models\ProjectField::FIELD_SINGLE_SELECT ||
         $field->field_type == \App\Models\ProjectField::FIELD_MULTI_SELECT)

    <select name="{{$field->field_code}}" class="form-control">

    @foreach ($selectValues as $selectValue)

    @if ($field->id == $selectValue->project_field_id)

        <option value="{{$selectValue->id}}" 
        
        @if (isset($fieldValue) && $fieldValue == $selectValue->id)

        selected

        @endif
        
        >{{$selectValue->value_text}}</option>

    @endif

    @endforeach

    </select>

@endif

</div>

@endforeach

<div class="form-group col-sm-6">
    <label for="file">File</label>
    <input type="file" name="file" class="form-control">
</div>