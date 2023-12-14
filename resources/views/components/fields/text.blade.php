@php
    $modelField = $column->getName();
@endphp
<div class="mb-3">
    <label class="form-label">{{ $column->getTitle() }}</label>
    <input type="text" class="form-control" name="example-text-input" placeholder="Input placeholder">
    @error($modelField)
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
