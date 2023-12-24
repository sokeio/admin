<?php

namespace Sokeio\Admin\Livewire\Role;

use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\Role;

class RoleTable extends Table
{
    public function getTitle()
    {
        return __('Role');
    }

    protected function getModel()
    {
        return Role::class;
    }
    protected function getButtons()
    {
        return [
            UI::Button(__('Create Role'))->ModalRoute('admin.role.add')->ModalTitle(__('Create role'))
        ];
    }

    //The record has been deleted successfully.
    public function getTableActions()
    {
        return [
            UI::Button(__('Edit'))->Warning()->ModalRoute('admin.role.edit', function ($row) {
                return [
                    'dataId' => $row->id
                ];
            })->ModalTitle(__('Edit Role')),
            UI::Button(__('Remove'))->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
                return 'doRemove(' . $item->getDataItem()->id . ')';
            })
            // UI::ButtonGroup([

            // ])
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
    public function doChangeStatus($id, $status)
    {
        $this->getQuery()->where('id', $id)->update(['status' => $status]);
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Name')),
            UI::Text('slug')->Label(__('Slug')),
            UI::Button('status')->Label(__('Status'))->WireClick(function ($item) {
                if ($item->getDataItem()->status) {
                    $item->Title(__('Active'));
                } else {
                    $item->Title(__('Block'));
                    $item->Warning();
                }
                return 'doChangeStatus(' . $item->getDataItem()->id . ',' . ($item->getDataItem()->status ? 0 : 1) . ')';
            })
        ];
    }
}
