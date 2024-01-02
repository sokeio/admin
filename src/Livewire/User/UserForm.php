<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Admin\Components\Form;
use Sokeio\Admin\Components\UI;
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
    protected function removeBefore($user)
    {
        if ($user->hasRole(Role::SupperAdmin())) {
            $this->showMessage(__('You cannot delete an admin account.'));
            return false;
        }
        return true;
    }
    // public function getPermisionByIds($ids)
    // {
    //     $this->skipRender();
    //     if ($ids) {
    //         $permison = Permission::query()->whereIn('id',  $ids)->get()->toArray();
    //         return $permison;
    //     }
    //     return [];
    // }
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
                            ])->When(function () {
                                return  !$this->isEdit();
                            }),
        //                     UI::Column12([
        //                         UI::ChooseModal('quyen')->Label(__('Quyền'))->Modal(function () {
        //                             return route('admin.permission.choose');
        //                         })
        //                             ->Template('
        //                         <template x-if="$wire.data.quyen" x-for="itemTextContent in $wire.getPermisionByIds(dataItemIds())">
        //     <label x-show="itemTextContent" class="px-2 py-1 me-2 mb-2 border" x-text="itemTextContent.name"></label>
        // </template>')
        //                             ->required()
        //                     ]),

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
                ])->When(function () {
                    return  $this->isEdit();
                })
            ])->ClassName('p-3');
    }
}
