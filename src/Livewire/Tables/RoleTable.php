<?php

namespace Sokeio\Admin\Livewire\Tables;

use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\Permission;

class RoleTable extends Table
{
    public function getTitle()
    {
        return __('Quản lý Role');
    }
    protected function getModel()
    {
        return Permission::class;
    }
    public function getButtons()
    {
        return [
            UI::ButtonGroup([
                UI::Button('Test')->Route('testUser')->ModalTitle('test')->ClassName('w-100'),
                UI::Button('Demo')->ClassName('w-100')
            ])
        ];
    }
    public function getTableActions()
    {
        return [
            UI::ButtonGroup([
                UI::Button('Test')->Route('testUser', function ($row) {
                    return [
                        'dataId' => $row->id
                    ];
                })->ClassName('w-100'),
                UI::Button('Demo')->ClassName('w-100')
            ])
        ];
    }
    // public function showSearchUI(){
    //     return true;
    // }
    // public function searchUI()
    // {
    //     return [
    //         UI::Row([
    //             UI::Column6([
    //                 UI::Text('name')->LIKE()->Label('Tên Role')
    //             ])
    //         ])

    //     ];
    // }

    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Role')),
            UI::Text('slug')->Label(__('Slug'))->FieldValue(function ($row) {
                return data_get($row, 'slug');
            })
        ];
    }
}
