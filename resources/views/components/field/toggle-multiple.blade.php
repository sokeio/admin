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
    @if ($datasources)
        <div class="row">
            @foreach ($datasources as $item)
                <div class="col-6">
                    <label class="form-check form-switch">
                        <input wire:model='{{ $formField }}' name="{{ $formField }}" class="form-check-input"
                            type="checkbox" value="{{ data_get($item, $FieldKey) }}">
                        <span class="form-check-label">{{ data_get($item, $FieldText) }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    @endif
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
