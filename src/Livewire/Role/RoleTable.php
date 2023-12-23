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
    public function getButtons()
    {
        return [
            UI::Button(__('Create Role'))->ModalRoute('admin.role.add')->ModalTitle(__('Create role new'))
        ];
    }
    public function doRemove($id)
    {
        // Retrieve the record you want to delete
        $record = Role::find($id);

        if ($record) {
            // Delete the record
            $record->delete();

            // Record successfully deleted
            echo "The record has been deleted successfully.";
        } else {
            // Record not found
            echo "The record does not exist.";
        }
    }
    //The record has been deleted successfully.
    public function getTableActions()
    {
        return [
            UI::ButtonGroup([
                UI::Button(__('edit'))->ModalRoute('admin.role.edit', function ($row) {
                    return [
                        'dataId' => $row->id
                    ];
                })->ModalTitle(__('Update item role'))->ClassName('w-100'),
                UI::Button(__('remove'))->ClassName('w-100')->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
                    return 'doRemove(' . $item->getDataItem()->id . ')';
                })
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
            UI::Text('name')->Label(__('Name')),
            UI::Text('slug')->Label(__('Slug'))
        ];
    }
}
