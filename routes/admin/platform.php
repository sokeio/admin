<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Facades\Theme;

Route::group(['as' => 'admin.'], function () {
    Route::get('/plugins', route_theme(\Sokeio\Admin\Livewire\Extentions\Index::class, ['ExtentionType' => 'plugin']))->name('plugin');
    Route::get('/modules', route_theme(\Sokeio\Admin\Livewire\Extentions\Index::class, ['ExtentionType' => 'module']))->name('module');
    Route::get('/themes', route_theme(\Sokeio\Admin\Livewire\Extentions\Index::class, ['ExtentionType' => 'theme']))->name('theme');
    Route::post('extention/{ExtentionType}', route_theme(\Sokeio\Admin\Livewire\Extentions\Create::class))->name('create-extention');
    Route::post('extention-file/{ExtentionType}/{ExtentionId}', route_theme(\Sokeio\Admin\Livewire\Extentions\CreateFile::class))->name('create-extention-file');
});
