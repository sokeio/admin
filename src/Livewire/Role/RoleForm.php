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
    public function layoutUI()
    {
        return
            UI::Prex(
                'data',
                [
                    UI::Tab()
                        ->addTab(
                            Tab::TabItem(__('Thông tin')),
                            [
                                UI::Row([
                                    UI::Column6([
                                        UI::Text('name')->Label('Tên role')->required()
                                    ]),
                                ]),
                            ],
                        ),
                    UI::Card([
                        UI::Button('Lưu')->WireClick('doSave()')
                    ])->ClassName('mt-1 p-1')->Title('Nội dung dữ liệu')

                ]
            );
    }
}
