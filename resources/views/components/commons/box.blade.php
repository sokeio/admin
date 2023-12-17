<div class="card {{ $column->getClassName() ?? '' }}" {!! $column->getAttribute() ?? '' !!}>
    <div class="card-body">
        @if ($title = $column->getTitle())
            <h3 class="card-title">{{ $title }}</h3>
        @endif
        @includeIf('admin::components.layout', ['layout' => $column->getContent()])
    </div>
</div>
