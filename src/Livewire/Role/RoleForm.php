<?php

namespace Sokeio\Admin\Livewire\Role;

use Sokeio\Components\Common\Tab;
use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Models\Permission;
use Sokeio\Models\Role;

class RoleForm extends Form
{
    public $permissionids = [];
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

    protected function loadDataAfter($role)
    {
        $this->permissionids = $role->PermissionIds;
    }
    protected function saveAfter($role)
    {
        $role->permissions()->sync(collect($this->permissionids)->filter(function ($item) {
            return $item > 0;
        })->toArray());
    }
    public function FormUI()
    {
        return UI::Container([
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
            ),
            UI::Row([
                UI::Column12([
                    UI::CheckboxMutil('permissionids')->Label(__('Permission'))->DataSource(function () {
                        return Permission::all();
                    })->NoSave()
                ]),
            ])
        ])

            ->ClassName('p-3');
    }
}
