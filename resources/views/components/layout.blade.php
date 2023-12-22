@foreach ($layout as $item)
    @isset($dataItem)
        @php
            $item->DataItem($dataItem);
        @endphp
    @endisset
    @includeIf($item->getView(), ['column' => $item])
@endforeach
