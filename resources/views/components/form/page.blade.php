<div class="page-body mt-2">
    <div class="container-fluid ">
        <div @if ($formUIClass) class="{{ $formUIClass }}" @endif>
            @includeIf('admin::components.layout', ['layout' => $layout])
            @includeIf('admin::components.layout', ['layout' => $footer])
        </div>
    </div>
</div>
