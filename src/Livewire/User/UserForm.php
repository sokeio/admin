<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Models\Permission;
use Sokeio\Models\Role;
use Sokeio\Models\User;

class UserForm extends Form
{
    public $roleids = [];
    public $permissionids = [];
    protected function getModel():string
    {
        return User::class;
    }
    public function getTitle()
    {
        return __('User');
    }
    public function getButtons()
    {
        return [];
    }
    protected function loadDataAfter($user)
    {
        $this->roleids = $user->RoleIds;
        $this->permissionids = $user->PermissionIds;
    }
    protected function saveAfter($user)
    {
        $user->permissions()->sync(collect($this->permissionids)->filter(function ($item) {
            return $item > 0;
        })->toArray());
        $user->roles()->sync(collect($this->roleids)->filter(function ($item) {
            return $item > 0;
        })->toArray());
    }
    protected function removeBefore($user)
    {
        if ($user->hasRole(Role::SupperAdmin())) {
            $this->showMessage(__('You cannot delete an admin account.'));
            return false;
        }
        return true;
    }
    public function formUI()
    {
        return
            UI::container([
                UI::prex(
                    'data',
                    [
                        UI::row([
                            UI::column6([
                                UI::text('name')->label(__('Fullname'))->required()
                            ]),
                            UI::column6([
                                UI::text('email')->label(__('Email'))->required()
                            ]),
                            UI::column6([
                                UI::Password('password')->label(__('Password'))->required()
                            ])->When(function () {
                                return  !$this->isEdit();
                            }),

                        ]),
                    ]
                ),
                UI::row([
                    UI::column12([
                        UI::checkBoxMutil('roleids')->label(__('Role'))->dataSource(function () {
                            return Role::all();
                        })->noSave()
                    ]),
                    UI::column12([
                        UI::checkBoxMutil('permissionids')->label(__('Permission'))->dataSource(function () {
                            return Permission::all();
                        })->noSave()
                    ]),
                ])->When(function () {
                    return  $this->isEdit();
                })
            ])->className('p-3');
    }
}
