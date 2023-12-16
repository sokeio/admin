<div class="{{ $column->getClassName() ?? '' }}" {!! $column->getAttribute() ?? '' !!}>
    @foreach ($column->getContent() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
