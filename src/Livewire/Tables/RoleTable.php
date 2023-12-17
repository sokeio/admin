<?php

namespace Sokeio\Admin\Livewire\Tables;

use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\Role;

class RoleTable extends Table
{
    protected function getModel(){
        return Role::class;
    }
    public function getButtons()
    {
        return [
            UI::Button('Demo'),
            UI::Button('Demo')
        ];
    }
    public function searchUI()
    {
        return [
            UI::Row([
                UI::Column6([
                    UI::Text('name')->Label('Tên Role')
                ])
            ])
         
        ];
    }
    public function getTitle()
    {
        return __('Quản lý Role');
    }
}
