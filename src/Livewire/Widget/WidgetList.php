<?php

namespace Sokeio\Admin\Livewire\Widget;

use Sokeio\Component;
use Livewire\Attributes\Reactive;
use Sokeio\Admin\Facades\Dashboard;

class WidgetList extends Component
{
    #[Reactive]
    public $locked = false;
    public function updateWidgetOrder($data)
    {
        // $data =  collect($data)->map(function ($item) {
        //     return $item['value'];
        // })->toArray();
        // $this->skipRender();
        // $this->dispatch('DashboardRefreshData');
    }
    public function render()
    {
        return view('admin::widget.list', [
            'widgets' => Dashboard::getWidget()
        ]);
    }
}
