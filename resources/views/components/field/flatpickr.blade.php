@php
    $modelField = $column->getName();
    $modelLabel = $column->getLabel() ?? $modelField;
    $modelPlaceholder = $column->getPlaceholder() ?? $modelLabel;
    $formField = $column->getFormField();
    $fromField = $column->getFromField();
    $toField = $column->getToField();

    $MinValue = $column->getMinValue();
    $MaxValue = $column->getMaxValue();
@endphp
<div class=" {{ $column->getClassName() ?? 'mb-3' }}">
    <label class="form-label">{{ $modelLabel }}</label>
    <div wire:ignore>
        <input class="form-control" name="field-{{ $modelField }}" placeholder="{{ $modelPlaceholder }}" wire:flatpickr
            wire:flatpickr.options='@json($column->getFieldOption())' {!! $column->getWireAttribute() !!} x-init="@if ($MinValue) $el.livewire____flatpickr.set('minDate', {{ $MinValue }}); @endif @if ($MaxValue) $el.livewire____flatpickr.set('maxDate', {{ $MaxValue }}); @endif
            
            @if ($toField) $watch('$wire.{{ $toField }}',
                function() {
                    $el.livewire____flatpickr.set('maxDate', $wire.{{ $toField }});
                }); @endif @if ($fromField) $watch('$wire.{{ $fromField }};',
                function() {
                    $el.livewire____flatpickr.set('minDate', $wire.{{ $fromField }});
                }); @endif" />
    </div>
    @error($formField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
<input wire:ignore wire:flatpickr wire:flatpickr.options='@json($item->getFieldOption())' {!! $item->getAttribute() ?? '' !!}
    class="form-control" wire:model='{{ $modelField }}' name="{{ $modelField }}"
    placeholder="{{ $item->getPlaceholder() }}" x-init="@if ($toField) $watch('$wire.{{ $item->getModelField($toField) }}',
    function() {
        $el.livewire____flatpickr.set('maxDate', $wire.{{ $item->getModelField($toField) }});
    }); @endif @if ($fromField) $watch('$wire.{{ $item->getModelField($fromField) }};',
    function() {
        $el.livewire____flatpickr.set('minDate', $wire.{{ $item->getModelField($fromField) }});
    }); @endif">
