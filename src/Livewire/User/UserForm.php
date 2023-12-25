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
    public function getTitle()
    {
        return __('User');
    }
    public function getBreadcrumb()
    {
        return [
            Breadcrumb::Item(__('Home'), route('admin.dashboard'))
        ];
    }
    public function getButtons()
    {
        return [];
    }
    public function getModel()
    {
        return User::class;
    }
    public function FormUI()
    {
        return
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
                        UI::Column12([
                            UI::Select('role')->Label(__('Role'))->DataSource(function () {
                                return Role::all();
                            })
                        ]),
                        UI::Column12([
                            UI::Select('permission')->Label(__('Permission'))->DataSource(function () {
                                return Permission::all();
                            })
                        ]),
                    ]),
                ]
            )->ClassName('p-3');
    }
}
