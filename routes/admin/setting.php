<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.setting.', 'prefix' => 'setting'], function () {
  Route::get('/', routeTheme(\Sokeio\Admin\Livewire\Setting\Overview::class))->name('general');
  // Route::get('/profile', routeTheme(\Sokeio\Admin\Livewire\Pages\Profile\Edit::class))->name('profile');
});
//admin.setting.cache