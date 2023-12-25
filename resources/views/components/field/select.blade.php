@php
    $modelField = $column->getName();
    $modelLabel = $column->getLabel() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelLabel;
    $formField = $column->getFormField();
    $datasources = $column->getDataSource();
    $FieldKey = $column->getFieldKey();
    $FieldText = $column->getFieldText();
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelLabel }}</label>
    <select class="form-select" name="field-{{ $modelField }}" placeholder="{{ $modelPlaceholder }}"
        {!! $column->getWireAttribute() !!}>
        @if ($datasources)
            @foreach ($datasources as $item)
                <option value="{{ data_get($item, $FieldKey) }}">{{ data_get($item, $FieldText) }}</option>
            @endforeach
        @endif
    </select>
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
