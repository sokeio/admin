<div class="btn-list {{ $column->getClassName() ?? '' }}" {!! $column->getAttribute() ?? '' !!}>
    @includeIf('admin::components.layout', ['layout' => $column->getContent()])
</div>
