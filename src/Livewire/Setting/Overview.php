<?php

namespace Sokeio\Admin\Livewire\Setting;

use Sokeio\Components\FormSetting;
use Sokeio\Components\UI;

class Overview extends FormSetting
{
    public function getTitle()
    {
        return __('System Overview');
    }
    protected function SettingUI()
    {
        return UI::Row([
            UI::Column6([
                UI::Text('PLATFORM_SITE_NAME')->Label(__('Page Name'))
            ])
        ]);
    }
}
