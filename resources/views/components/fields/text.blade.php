@php
    $modelField = $column->getName();
    $modelTitle = $column->getTitle() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelTitle;
    $formField = $column->getFormField();
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelTitle }}</label>
    <input type="text" class="form-control" name="field-{{ $modelField }}" placeholder="{{ $modelPlaceholder }}">
    @error($modelField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
