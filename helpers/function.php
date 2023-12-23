<?php

//code php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\BaseManager;
use Sokeio\Admin\Facades\Menu;
use Sokeio\Admin\FieldView;
use Sokeio\Admin\Item;

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
if (!function_exists('field_render')) {
    function field_render(Item $item, $itemForm = null, $dataId = null)
    {
        return FieldView::Render($item, $itemForm, $dataId);
    }
}
if (!function_exists('form_render')) {
    function form_render(BaseManager $itemManager,  $itemForm = null, $dataId = null)
    {
        return view('admin::forms.render', [
            'manager' => $itemManager,
            'form' => $itemForm,
            'dataId' => $dataId
        ])->render();
    }
}

if (!function_exists('table_render')) {
    function table_render(BaseManager $itemManager, $dataItems = null, $dataFilters = null, $dataSorts = null, $formTable = null, $selectIds = null, $page_title = null)
    {
        return view('admin::tables.render', [
            'manager' => $itemManager,
            'items' => $dataItems,
            'filters' => $dataFilters,
            'sorts' => $dataSorts,
            'formTable' => $formTable,
            'selectIds' => $selectIds,
            'page_title' => $page_title,
        ])->render();
    }
}
