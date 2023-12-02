<div class="page-body mt-2 px-2">
    <div class="card">
        <div class="row g-0">
            <div class="col-2 d-none d-md-block border-end">
                <div class="card-body">
                    <h2 class="subheader">Settings</h2>
                    <div class="list-group list-group-transparent">
                        @if ($formWithTitle)
                            @foreach ($formWithTitle as $item)
                                <button wire:click='ChangeTab("{{ $item['key'] }}")'
                                    class="list-group-item list-group-item-action d-flex align-items-center @if ($tabActive == $item['key']) active @endif">{{ $item['title'] ?? $item['key'] }}</button>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <livewire:admin::pages.setting.form :$tabActive wire:key='setting-{{ $tabActiveIndex }}' />
            </div>
        </div>
    </div>
</div>
