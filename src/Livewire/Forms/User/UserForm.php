<?php

namespace Sokeio\Admin\Livewire\Forms\User;

use Sokeio\Admin\Components\Common\Tab;
use Sokeio\Admin\Components\UI;
use Sokeio\Admin\Components\Form;
use Sokeio\Models\Role;

class UserForm extends Form
{
    public function getTitle()
    {
        return __('Thêm mới Tài khoản');
    }
    public function getModel()
    {
        return Role::class;
    }
    public function doTest()
    {
        $this->validate();
        $this->showMessage('xin cha9f');
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
