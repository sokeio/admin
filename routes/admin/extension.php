<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('route_extension')) {
    function route_extension($name)
    {
        Route::get('/' . $name . 's', routeTheme(\Sokeio\Admin\Livewire\Extentions\Index::class, ['ExtentionType' => $name]))->name($name);
        Route::post('/' . $name . 's/create', routeTheme(\Sokeio\Admin\Livewire\Extentions\Create::class, ['ExtentionType' => $name]))->name($name . '.create');
        Route::post('/' . $name . 's/create-file/{ExtentionId}', routeTheme(\Sokeio\Admin\Livewire\Extentions\CreateFile::class, ['ExtentionType' => $name]))->name($name . '.create-file');
    }
}

Route::group(['as' => 'admin.extension.'], function () {
    route_extension('plugin');
    route_extension('module');
    route_extension('theme');
});