<div class="{{ $column->getClassName() ?? '' }} {{ column_size($column->getCol() ?? 'col') }}" {!! $column->getAttribute() ?? '' !!}>
    @includeIf('admin::components.layout', [
        'layout' => $column->getContent(),
        'dataItem' => $column->getDataItem(),
    ])
</div>
