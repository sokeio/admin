<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\CacheManager;

Route::get('/', \Sokeio\Admin\Livewire\Dashboard::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', route_theme(\Sokeio\Admin\Livewire\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/log-viewers', route_theme(\Sokeio\Admin\Livewire\LogsViewer::class))->name('admin.log-viewer');
Route::get('/cache', CacheManager::class)->name('admin.cache');
