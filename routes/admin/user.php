<?php

use Sokeio\Admin\Crud\UserCrud;
use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\Permission\PermissionTable;
use Sokeio\Admin\Livewire\Role\RoleForm;
use Sokeio\Admin\Livewire\Role\RoleTable;

Route::group(['as' => 'admin.'], function () {
    Route::get('permission', PermissionTable::class)->name('permission');
    route_crud('role', RoleTable::class, RoleForm::class);
    UserCrud::RoutePage('user');
    // RoleCrud::RoutePage('role');
    // PermissionCrud::RoutePage('permission');
});
