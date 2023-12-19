<a href="{{ $column->getLink() ?? '#' }}" class="btn btn-primary {{ $column->getClassName() ?? '' }}"
    {!! $column->getAttribute() ?? '' !!} {!! $column->getWireAttribute() ?? '' !!} {!! $column->getSokeAttribute() ?? '' !!}>
    {!! $column->getTitle() !!}
</a>
