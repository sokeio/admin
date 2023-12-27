@php
    $modelField = $column->getName();
    $modelLabel = $column->getLabel() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelLabel;
    $formField = $column->getFormField();
    $mutil=$column->getMutil();
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelLabel }}</label>
    <button name="field-{{ $modelField }}" {!! $column->getAttribute() ?? '' !!} sokeio:filemanager="{{ $formField }}"
        @if ($mutil) sokeio:filemanager-mutil @endif class="dropzone dz-clickable">
        <span class="dz-default dz-message">@lang('Choose Images')</span>
        <div x-show="$wire.{{ $formField }}">
            @if ($mutil)
                <template x-for="item in $wire.{{ $formField }}">
                    <img :src="item" />
                </template>
            @else
                <img :src="$wire.{{ $formField }}" />
            @endif
        </div>
    </button>
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
