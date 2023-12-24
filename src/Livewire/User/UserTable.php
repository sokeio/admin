<?php

namespace Sokeio\Admin\Livewire\User;

use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\User;

class UserTable extends Table
{
    public function getTitle()
    {
        return __('User');
    }

    protected function getModel()
    {
        return User::class;
    }
    public function getButtons()
    {
        return [
            UI::Button(__('Create User'))->ModalRoute('admin.user.add')->ModalTitle(__('Create User new'))
        ];
    }
  
    //The record has been deleted successfully.
    public function getTableActions()
    {
        return [
            UI::ButtonGroup([
                UI::Button(__('edit'))->ModalRoute('admin.user.edit', function ($row) {
                    return [
                        'dataId' => $row->id
                    ];
                })->ModalTitle(__('Update item User'))->ClassName('w-100'),
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
    //                 UI::Text('name')->LIKE()->Label('Tên User')
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
