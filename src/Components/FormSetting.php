<?php

namespace Sokeio\Admin\Components;

use Sokeio\Admin\Components\Concerns\WithForm;
use Sokeio\Component;
use Sokeio\Facades\Theme;

class FormSetting extends Component
{
    use  WithForm;
    protected function FormUI(){
        return UI::Card($this->SettingUI());
    }
    protected function SettingUI(){
        return [];
    }
    public function loadData()
    {
        if (method_exists($this, 'loadDataAfter')) {
            call_user_func([$this, 'loadDataAfter']);
        }
        foreach ($this->getColumns() as $column) {
            data_set($column->getNameEncode(), setting($column->getFormFieldEncode()));
        }
    }
    public function doSave()
    {
        $this->doValidate();
        DB::transaction(function (){
            foreach ($this->getColumns() as $column) {
                set_setting($column->getNameEncode(), data_get($this, $column->getFormFieldEncode()));
            }
        });
        $this->showMessage($this->formMessage(false));
        if (!$this->CurrentIsPage()) {
            $this->refreshRefComponent();
            $this->closeComponent();
        }
    }
}
