<?php

namespace Sokeio\Admin\Widgets;

use Sokeio\Admin\Dashboard\Widget;
use Sokeio\Models\Permission;

class PermissionTotalWidget extends Widget
{

    public function __construct($key)
    {
        parent::__construct($key);
        $this->Name(__('Permission Total'))->WidgetNumber()->Data(function () {
            return [
                'widgetTitle' => __('Permission Total'),
                'widgetData' => Permission::count()
            ];
        })->column('col4');
    }
}
