<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Sokeio\Admin\Livewire\Pages\Dashboard\Index::class)->name('admin.dashboard');
Route::post('/dashboard-setting/{widgetId?}', route_theme(\Sokeio\Admin\Livewire\Setting\DashboardSetting::class))->name('admin.dashboard-setting');
Route::get('/settings', route_theme(\Sokeio\Admin\Livewire\Pages\Setting\Index::class))->name('admin.setting');
Route::get('/log-viewers', route_theme(\Sokeio\Admin\Livewire\Pages\LogsViewer\Index::class))->name('admin.log-viewer');

Route::get('/RoleTable', \Sokeio\Admin\Livewire\Tables\RoleTable::class);
Route::post('/UserForm/{dataId?}', \Sokeio\Admin\Livewire\Forms\User\UserForm::class)->name('testUser');
