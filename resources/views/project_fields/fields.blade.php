<!-- Field Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_code', 'Field Code:') !!}
    {!! Form::text('field_code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>

<!-- Field Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_type', 'Field Type') !!}
    <select name="field_type" class="form-control">
        <option value="{{\App\Models\ProjectField::FIELD_SHORT_TEXT}}">Short Text</option>
        <option value="{{\App\Models\ProjectField::FIELD_TEXT}}">Text</option>
        <option value="{{\App\Models\ProjectField::FIELD_TEXT_AREA}}">Text Area</option>
        <option value="{{\App\Models\ProjectField::FIELD_DATE}}">Date</option>
        <option value="{{\App\Models\ProjectField::FIELD_SINGLE_SELECT}}">Single Select</option>
        <option value="{{\App\Models\ProjectField::FIELD_MULTI_SELECT}}">Multi Select</option>
    </select>
</div>


<!-- Field Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_text', 'Field Text:') !!}
    {!! Form::text('field_text', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Visible Field -->
<div class="form-group col-sm-6">
    <label for="visible">Field is Visible</label>
    <select name="visible" class="form-control">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>


<!-- Mandatory Field -->
<div class="form-group col-sm-6">
    <label for="mandatory">Field is Mandatory</label>
    <select name="mandatory" class="form-control">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>


<!-- Sequence Field -->
<div class="form-group col-sm-6">
    <label for="sequence">Field Sequence</label>
    <select name="sequence" class="form-control">
        @for ($i = 0; $i <= $count; $i++)
        <option value="{{$i+1}}">{{$i+1}}</option>
        @endfor
    </select>
</div>
