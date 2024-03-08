<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\ToolSystem;

Route::get('/', \Sokeio\Admin\Livewire\Dashboard::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', routeTheme(\Sokeio\Admin\Livewire\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/system/log-viewers', routeTheme(\Sokeio\Admin\Livewire\LogsViewer::class))->name('admin.system.log-viewer');
Route::get('/system/tools', ToolSystem::class)->name('admin.system.tools');
