<?php

namespace Sokeio\Admin\Livewire\Role;

use Sokeio\Components\Table;
use Sokeio\Components\UI;
use Sokeio\Models\Role;

class RoleTable extends Table
{
    protected function getModel()
    {
        return Role::class;
    }
    public function getTitle()
    {
        return __('Role');
    }
    protected function getRoute()
    {
        return 'admin.system.role';
    }

    public function doChangeStatus($id, $status)
    {
        $this->getQuery()->where('id', $id)->update(['status' => $status]);
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Name')),
            UI::Text('slug')->Label(__('Slug')),
            UI::Button('status')->Label(__('Status'))->NoSort()->WireClick(function ($item) {
                if ($item->getDataItem()->status) {
                    $item->Title(__('Active'));
                    $item->Primary();
                } else {
                    $item->Title(__('Block'));
                    $item->Warning();
                }
                return 'doChangeStatus(' . $item->getDataItem()->id . ',' . ($item->getDataItem()->status ? 0 : 1) . ')';
            })
        ];
    }
}
