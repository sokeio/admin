<div>
    @foreach ($layout as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
