<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Sokeio\Facades\Assets;

class Dashboard extends Component
{
    public function mount()
    {
        Assets::setTitle(__('Dashboard'));
    }
    public function render()
    {
        return view('admin::dashboard.index', [
            'page_title' => __('Dashboard')
        ]);
    }
}
