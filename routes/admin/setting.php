<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.setting.', 'prefix' => 'system'], function () {
  Route::get('/', routeTheme(\Sokeio\Admin\Livewire\Setting\Overview::class))->name('general');
});
