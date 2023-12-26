@foreach ($layout as $item)
    @if ($item)
        @isset($dataItem)
            @php
                $item->ClearCache();
                $item->DataItem($dataItem);
            @endphp
        @endisset
        @includeIf($item->getView(), ['column' => $item])
    @endif
@endforeach
