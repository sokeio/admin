<div class=" row {{ $column->getClassName() ?? '' }}"  {!! $column->getAttribute() ?? '' !!}>
    @foreach ($column->getContent() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
