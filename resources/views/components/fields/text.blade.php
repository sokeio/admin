@php
    $modelField = $column->getName();
    $modelLabel = $column->getLabel() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelLabel;
    $formField = $column->getFormField();
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelLabel }}</label>
    <input type="text" class="form-control" name="field-{{ $modelField }}" placeholder="{{ $modelPlaceholder }}"
        {!! $column->getWireAttribute() !!}>
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
