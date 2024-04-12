<?php

namespace Sokeio\Admin\Widgets;

use Illuminate\Support\ServiceProvider;
use Sokeio\Admin\Facades\Dashboard;

class WidgetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Dashboard::Register(UserTotalWidget::class);
        Dashboard::Register(RoleTotalWidget::class);
        Dashboard::Register(PermissionTotalWidget::class);
    }
}
