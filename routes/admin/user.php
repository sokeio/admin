<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Admin\Livewire\Language\LanguageForm;
use Sokeio\Admin\Livewire\Language\LanguageTable;
use Sokeio\Admin\Livewire\Permission\PermissionTable;
use Sokeio\Admin\Livewire\Role\RoleForm;
use Sokeio\Admin\Livewire\Role\RoleTable;
use Sokeio\Admin\Livewire\User\UserChangePasswordForm;
use Sokeio\Admin\Livewire\User\UserForm;
use Sokeio\Admin\Livewire\User\UserTable;

Route::group(['as' => 'admin.system.'], function () {
    Route::get('permission', PermissionTable::class)->name('permission');
    Route::post('permission', PermissionTable::class)->name('permission.choose');
    Route::post('user/{dataId}/change-password', UserChangePasswordForm::class)->name('user.change-password');
    routeCrud('role', RoleTable::class, RoleForm::class);
    routeCrud('user', UserTable::class, UserForm::class);
    // routeCrud('language', LanguageTable::class, LanguageForm::class);
});
