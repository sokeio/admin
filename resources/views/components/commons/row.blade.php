<div class=" row {{ $column->getClassName() ?? '' }}">
    @foreach ($column->getColumns() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
