<div class="row {{ $column->getClassName() ?? '' }}"  {!! $column->getAttribute() ?? '' !!}>
    @includeIf('admin::components.layout', [
        'layout' => $column->getContent(),
        'dataItem' => $column->getDataItem(),
    ])
</div>