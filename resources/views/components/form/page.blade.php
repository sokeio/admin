<div>
    <div class="page-header d-print-none mt-2">
        <div class="container-fluid">
            <div class="row g-2 align-items-center">
                <div class="col">
                    {!! breadcrumb() !!}
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @includeIf('admin::components.layout', ['layout' => $buttons])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-2">
        <div class="container-fluid">
            @includeIf('admin::components.layout', ['layout' => $layout])
        </div>
    </div>
</div>
