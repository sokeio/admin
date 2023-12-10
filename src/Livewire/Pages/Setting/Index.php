<?php

namespace Sokeio\Admin\Livewire\Pages\Setting;

use Livewire\Attributes\Url;
use Sokeio\Component;
use Sokeio\Admin\Facades\SettingForm;

class Index extends Component
{
    #[Url] 
    public $tabActive = 'overview';
    public $tabActiveIndex = 0;
    public function ChangeTab($tab)
    {
        $this->tabActive = $tab;
        $this->tabActiveIndex++;
    }
    public function render()
    {

        return view('admin::pages.setting.index', [
            'formWithTitle' => SettingForm::getFormWithTitles(),
            'page_title' => __('Setting')
        ]);
    }
}
