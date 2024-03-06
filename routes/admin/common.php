<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\AssetManager;

Route::get('/', \Sokeio\Admin\Livewire\Dashboard::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', route_theme(\Sokeio\Admin\Livewire\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/system/log-viewers', route_theme(\Sokeio\Admin\Livewire\LogsViewer::class))->name('admin.system.log-viewer');
Route::get('/system/assets', AssetManager::class)->name('admin.system.assets');
