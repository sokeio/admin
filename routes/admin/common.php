<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Sokeio\Admin\Livewire\Dashboard::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', routeTheme(\Sokeio\Admin\Livewire\DashboardSetting::class))
    ->name('admin.dashboard-setting');
