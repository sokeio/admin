<?php

namespace Sokeio\Admin\Livewire\Widget;

use Livewire\Attributes\Reactive;
use Sokeio\Admin\Dashboard\Widget;
use Sokeio\Admin\Facades\Dashboard;
use Sokeio\Component;

class Index extends Component
{
    #[Reactive]
    public $widgetId;

    #[Reactive]
    public $locked = false;
    private Widget $widgetItem;
    public function booted()
    {
        $this->widgetItem = Dashboard::getWidgetByKey($this->widgetId)?->Component($this);
    }

    public function Action($action, $params)
    {
        $this->widgetItem->callAction($action, [$params], $this, $this->widgetId, $this->widgetItem);
        return $this;
    }
    public function render()
    {
        return view('admin::widget.index', [
            'widget' => $this->widgetItem,
        ]);
    }
}
