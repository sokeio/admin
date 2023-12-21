<?php

namespace Sokeio\Admin\Livewire\Tables;

use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\Role;

class RoleTable extends Table
{
    protected function getModel()
    {
        return Role::class;
    }
    public function getButtons()
    {
        return [
            UI::ButtonGroup([
                UI::Button('Test')->Route('testUser')->ClassName('w-100'),
                UI::Button('Demo')->ClassName('w-100')
            ])
        ];
    }
    public function searchUI()
    {
        return [
            UI::Row([
                UI::Column6([
                    UI::Text('leg.name')->Label('Tên Role')
                ])
            ])

        ];
    }
    public function getTitle()
    {
        return __('Quản lý Role');
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Role')),
            UI::Text('slug')->Label(__('Slug'))->FieldValue(function ($row) {
                return 'test:' . data_get($row,'slug');
            })
        ];
    }
}
