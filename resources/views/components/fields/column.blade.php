<div class=" {{ $column->getClassName() ?? '' }} {{ column_size($column->getName() ?? 'col') }}">
    @foreach ($column->getColumns() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
