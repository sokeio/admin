<div class="card {{ $column->getClassName() ?? '' }}">
    <div class="card-body">
        @if ($title = $column->getTitle())
            <h3 class="card-title">{{ $title }}</h3>
        @endif
        @foreach ($column->getContent() as $item)
            @includeIf($item->getView(), ['column' => $item])
        @endforeach
    </div>
</div>
