<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Sokeio\Facades\Assets;

class CacheManager extends Component
{
    public function mount()
    {
        Assets::setTitle(__('Cache Manager'));
    }
    public function render()
    {
        return view('admin::cache-manager.index', [
            'page_title' => __('Cache Manage')
        ]);
    }
}
