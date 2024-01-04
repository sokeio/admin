<div class="page-body mt-2">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body border-bottom py-3" x-init="">
                @includeIf('admin::components.layout', ['layout' => $layout])
                @includeIf('admin::components.layout', ['layout' => $footer])
            </div>
        </div>
    </div>
</div>
