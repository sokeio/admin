<div class=" {{ $column->getClassName() ?? '' }} {{ column_size($column->getCol() ?? 'col') }}"  {!! $column->getAttribute() ?? '' !!}>
    @foreach ($column->getContent() as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
