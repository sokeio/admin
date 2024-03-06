<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Components\Table;
use Sokeio\Components\UI;
use Sokeio\Models\User;

class UserTable extends Table
{
    protected function getModel()
    {
        return User::class;
    }
    public function getTitle()
    {
        return __('User');
    }
    protected function getRoute()
    {
        return 'admin.system.user';
    }

    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Name')),
            UI::Text('email')->Label(__('Email')),
            UI::Text('slug')->Label(__('Slug'))
        ];
    }
}
