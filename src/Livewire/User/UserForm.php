<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Admin\Components\Form;
use Sokeio\Admin\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Models\Permission;
use Sokeio\Models\Role;
use Sokeio\Models\User;

class UserForm extends Form
{
    public $roleids = [];
    public $permissionids = [];
    public function getModel()
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
    public function FormUI()
    {
        return
            UI::Container([
                UI::Prex(
                    'data',
                    [
                        UI::Row([
                            UI::Column6([
                                UI::Text('name')->Label(__('Fullname'))->required()
                            ]),
                            UI::Column6([
                                UI::Text('email')->Label(__('Email'))->required()
                            ]),
                            UI::Column6([
                                UI::Password('password')->Label(__('Password'))->required()
                            ]),

                        ]),
                    ]
                ),
                UI::Row([
                    UI::Column12([
                        UI::CheckboxMutil('roleids')->Label(__('Role'))->DataSource(function () {
                            return Role::all();
                        })->NoSave()
                    ]),
                    UI::Column12([
                        UI::CheckboxMutil('permissionids')->Label(__('Permission'))->DataSource(function () {
                            return Permission::all();
                        })->NoSave()
                    ]),
                ])
            ])->ClassName('p-3');
    }
}
