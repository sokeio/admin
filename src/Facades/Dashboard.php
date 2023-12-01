<?php

namespace Sokeio\Admin\Facades;

use Illuminate\Support\Facades\Facade;
use Sokeio\Admin\Dashboard\Widget;

/**
 * 
 * @method static void Register($key, $widget = null)
 * @method static mix getWidget()
 * @method static Widget getWidgetByKey($key)
 *
 * @see \Sokeio\Admin\Dashboard\DashboardManager
 */
class Dashboard extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sokeio\Admin\Dashboard\DashboardManager::class;
    }
}
