<div class=" row {{ $column->getClassName() ?? '' }}">
    @foreach ($column->getContent() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
