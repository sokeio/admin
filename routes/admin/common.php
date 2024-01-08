<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Sokeio\Admin\Livewire\Dashboard::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', route_theme(\Sokeio\Admin\Livewire\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/log-viewers', route_theme(\Sokeio\Admin\Livewire\LogsViewer::class))->name('admin.log-viewer');
