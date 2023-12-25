<?php

namespace Sokeio\Admin\Livewire\Role;

use Sokeio\Admin\Components\Common\Tab;
use Sokeio\Admin\Components\Form;
use Sokeio\Admin\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Models\Role;

class RoleForm extends Form
{
    public function getTitle()
    {
        return __('Role');
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
        return Role::class;
    }
    public function FormUI()
    {
        return
            UI::Prex(
                'data',
                [
                    UI::Row([
                        UI::Column6([
                            UI::Text('name')->Label(__('Role Name'))->required()
                        ]),
                        UI::Column6([
                            UI::Text('slug')->Label(__('Role Slug'))
                        ]),
                        UI::Column6([
                            UI::Checkbox('status')->Label(__('Role Status'))->Title(__('Active'))
                        ]),
                    ]),
                ]
            )->ClassName('p-3');
    }
}
