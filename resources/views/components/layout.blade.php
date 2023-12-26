@if ($layout)
    @foreach ($layout as $item)
        @if ($item && $item->getWhen())
            @isset($dataItem)
                @php
                    $item->ClearCache();
                    $item->DataItem($dataItem);
                @endphp
            @endisset
            @includeIf($item->getView(), ['column' => $item])
        @endif
    @endforeach
@endif
