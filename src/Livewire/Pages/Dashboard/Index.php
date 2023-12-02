<?php

namespace Sokeio\Admin\Livewire\Pages\Dashboard;

use Sokeio\Admin\Facades\Dashboard;
use Sokeio\Component;

class Index extends Component
{
    
    public function render()
    {
        return view('admin::pages.dashboard.index', [
            'page_title' => __('Dashboard')
        ]);
    }
}
