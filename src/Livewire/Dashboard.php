<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('admin::dashboard.index', [
            'page_title' => __('Dashboard')
        ]);
    }
}
