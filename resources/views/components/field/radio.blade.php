@php
    $modelField = $column->getName();
    $modelLabel = $column->getLabel() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelLabel;
    $formField = $column->getFormField();
    $modelTitle = $column->getTitle() ?? $modelLabel;
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelLabel }}</label>
    <label class="form-check">
        <input type="radio" class="form-check-input" name="field-{{ $modelField }}"
            placeholder="{{ $modelPlaceholder }}" {!! $column->getWireAttribute() !!} />
        <span class="form-check-label">{{ $modelTitle }}</span>
    </label>
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
