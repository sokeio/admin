<?php

namespace Sokeio\Admin\Livewire;

use Illuminate\Support\Facades\Cache;
use Sokeio\Component;
use Sokeio\Facades\Assets;

class CacheManager extends Component
{
    public function mount()
    {
        Assets::setTitle(__('Cache Manager'));
    }
    public function clearCache()
    {
        Cache::clear();
        $this->showMessage(__('Cache cleared'));
    }
    public function render()
    {
        return view('admin::cache-manager.index', [
            'page_title' => __('Cache Manage')
        ]);
    }
}
