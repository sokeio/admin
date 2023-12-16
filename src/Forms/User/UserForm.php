<?php

namespace Sokeio\Admin\Forms\User;

use Sokeio\Admin\Components\Commons\Tab;
use Sokeio\Admin\Components\UI;
use Sokeio\Admin\Components\Form;
use Sokeio\Models\User;

class UserForm extends Form
{
    public function getModel()
    {
        return User::class;
    }
    public function getLayout()
    {
        return
            UI::Container([
                UI::Card([])->ClassName('mb-4')->Title('Nội dung dữ liệu'),
                UI::Tab()
                    ->addTab(
                        Tab::TabItem(__('Thông tin')),
                        [
                            UI::Row([
                                UI::Column6([
                                    UI::Text('dfdff')->Title('Xin chào mọi người')
                                ]),
                                UI::Column6([
                                    UI::Text('dfdff')->Title('Nội dung')
                                ])
                            ]),
                        ],
                    )
                    ->addTab('SEO', [
                        UI::Row([
                            UI::Column6([
                                UI::Text('dfdff')
                            ]),
                            UI::Column6([
                                UI::Text('dfdff')
                            ])
                        ]),
                    ]),

            ])->Prex('data');
    }
}
