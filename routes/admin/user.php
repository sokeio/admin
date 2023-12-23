<?php

use Sokeio\Admin\Crud\UserCrud;
use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\Permission\PermissionTable;
use Sokeio\Admin\Livewire\Role\RoleForm;
use Sokeio\Admin\Livewire\Role\RoleTable;

Route::group(['as' => 'admin.'], function () {
    Route::get('permission', PermissionTable::class)->name('permission');
    Route::get('role', RoleTable::class)->name('role');
    Route::post('role/new', RoleForm::class)->name('role.add');
    Route::post('role/{dataId}', RoleForm::class)->name('role.edit');

    UserCrud::RoutePage('user');
    // RoleCrud::RoutePage('role');
    // PermissionCrud::RoutePage('permission');
});
