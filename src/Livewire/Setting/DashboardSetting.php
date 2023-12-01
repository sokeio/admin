<?php

namespace Sokeio\Admin\Livewire\Setting;

use Sokeio\Admin\Facades\Dashboard;
use Sokeio\Component;

class DashboardSetting extends Component
{
    public function changeWidget($id)
    {
        $widget = Dashboard::getWidgetByKey($id);
        if ($widget) {
            if ($widget->isActive())
                $widget->UnActive();
            else $widget->Active();
        }
        $this->refreshRefComponent();
    }
    public function render()
    {
        return view('admin::settings.dashboard', [
            'page_title' => __('Dashboard Setting'),
            'widgets' => Dashboard::getWidget()
        ]);
    }
}
