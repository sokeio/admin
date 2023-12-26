<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Facades\Menu;

if (!function_exists('route_crud')) {
    function route_crud($name, $table, $form)
    {
        Route::get($name, $table)->name($name);
        Route::post($name . '/new', $form)->name($name . '.add');
        Route::post($name . '/{dataId}', $form)->name($name . '.edit');
    }
}
if (!function_exists('menu_render')) {
    function menu_render($_position = '')
    {
        return Menu::render($_position);
    }
}
