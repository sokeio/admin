<?php

use Sokeio\Admin\Crud\UserCrud;
use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\Permission\PermissionTable;
use Sokeio\Admin\Livewire\Role\RoleForm;
use Sokeio\Admin\Livewire\Role\RoleTable;
use Sokeio\Admin\Livewire\User\UserForm;
use Sokeio\Admin\Livewire\User\UserTable;

Route::group(['as' => 'admin.'], function () {
    Route::get('permission', PermissionTable::class)->name('permission');
    Route::post('permission', PermissionTable::class)->name('permission.choose');
    Route::post('user/{dataId}/change-password', PermissionTable::class)->name('user.change-password');
    route_crud('role', RoleTable::class, RoleForm::class);
    route_crud('user', UserTable::class, UserForm::class);
    // UserCrud::RoutePage('user');
    // RoleCrud::RoutePage('role');
    // PermissionCrud::RoutePage('permission');
});
