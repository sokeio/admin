@php
    $page_title = $itemManager?->getTitle();
    $formSearchId = 'formSearch-' . time();
    $formSearchManger = $itemManager?->getFormSearch();
@endphp
<div class="table-page p-2">
    <div class="card">
        <div class="card-body {{ $cardBodyClass }}">
            @if ($itemManager)
                {!! table_render($itemManager, $dataItems, $dataFilters, $dataSorts, $formTable, $selectIds,$page_title) !!}
            @endif
        </div>
    </div>
</div>
