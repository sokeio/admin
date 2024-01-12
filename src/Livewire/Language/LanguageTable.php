<?php

namespace Sokeio\Admin\Livewire\Language;

use Sokeio\Components\Table;
use Sokeio\Components\UI;
use Sokeio\Models\Language;

class LanguageTable extends Table
{
    protected function getModel()
    {
        return Language::class;
    }
    public function getTitle()
    {
        return __('Language');
    }
    protected function getRoute()
    {
        return 'admin.language';
    }

    public function doChangeStatus($id, $status)
    {
        $this->getQuery()->where('id', $id)->update(['status' => $status]);
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Name')),
            UI::Text('code')->Label(__('Code')),
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
