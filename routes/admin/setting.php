<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.setting', 'prefix' => 'setting'], function () {
  Route::get('/', route_theme(\Sokeio\Admin\Livewire\Setting\Overview::class));
  // Route::get('/profile', route_theme(\Sokeio\Admin\Livewire\Pages\Profile\Edit::class))->name('profile');
});
//admin.setting.cache