<?php

namespace Sokeio\Admin\Forms\User;

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
        return [
            UI::Tab()
                ->addTab([
                    UI::Row([
                        UI::Column6([
                            UI::Text('dfdff')->Title('Xin chào mọi người')
                        ]),
                        UI::Column6([
                            UI::Text('dfdff')->Title('Nội dung')
                        ])
                    ]),
                ], 'Thông tin')
                ->addTab([
                    UI::Row([
                        UI::Column6([
                            UI::Text('dfdff')
                        ]),
                        UI::Column6([
                            UI::Text('dfdff')
                        ])
                    ]),
                ], 'SEO'),
            UI::Card([
                UI::Row([
                    UI::Column6([
                        UI::Text('dfdff')
                    ]),
                    UI::Column6([
                        UI::Text('dfdff')
                    ])
                ]),
            ])->Title('Nội dung dữ liệu'),
        ];
    }
}
