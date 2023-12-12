<?php

namespace Sokeio\Admin\Forms\User;

use Sokeio\Admin\Components\Field;
use Sokeio\Admin\Components\Form;

class UserForm extends Form
{
    public function getLayout()
    {
        return [
            Field::Row([
                Field::Column5([
                    Field::Box([
                        Field::Text('dfdff')
                    ]),
                ]),
                Field::Column6([])
            ]),
            Field::Box([
                Field::Text('dfdff')
            ])->Title('Noi dung')->ClassName('mt-2')
        ];
    }
}
