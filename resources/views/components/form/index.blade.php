<div class="">
    @foreach ($columns as $item)
        @includeIf($item->getView(), ['column' => $item])
    @endforeach
</div>
