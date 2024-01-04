<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Sokeio\Admin\Livewire\Pages\Dashboard\Index::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', route_theme(\Sokeio\Admin\Livewire\Setting\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/log-viewers', route_theme(\Sokeio\Admin\Livewire\Pages\LogsViewer\Index::class))->name('admin.log-viewer');
