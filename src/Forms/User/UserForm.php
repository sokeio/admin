<?php

namespace Sokeio\Admin\Forms\User;

use Sokeio\Admin\Components\Field;
use Sokeio\Admin\Components\Form;

class UserForm extends Form
{
    public function getColumns()
    {
        return [
            Field::Box([
                Field::Text('dfdff')
            ])
        ];
    }
}
