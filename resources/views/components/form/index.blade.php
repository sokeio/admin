<div @if($formUIClass) class="{{$formUIClass}}" @endif>
    @includeIf('admin::components.layout', ['layout' => $layout])
    @includeIf('admin::components.layout', ['layout' => $footer])
</div>
