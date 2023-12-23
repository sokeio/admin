<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Admin\Components\Common\Tab;
use Sokeio\Admin\Components\Form;
use Sokeio\Admin\Components\UI;
use Sokeio\Breadcrumb;
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
                                        UI::Text('name')->Label('Tên User')->required()
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
