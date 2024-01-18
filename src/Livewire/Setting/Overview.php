<?php

namespace Sokeio\Admin\Livewire\Setting;

use Sokeio\Components\FormSetting;
use Sokeio\Components\UI;
use Sokeio\Models\Language;

class Overview extends FormSetting
{
    public function getTitle()
    {
        return __('System Setting');
    }
    protected function SettingUI()
    {
        return UI::Row(apply_filters('SOKEIO_ADMIN_SETTING_OVERVIEW', [
            UI::Column6([
                UI::Text('PLATFORM_SYSTEM_NAME')->Label(__('System Admin Name')),
            ]),
            UI::Column6([
                UI::Select('PLATFORM_SYSTEM_LOCALE_DEFAULT')
                    ->Label(__('System Language'))
                    ->FieldKey('code')
                    ->DataSource(function () {
                        return Language::query()->where('status', 1)->get();
                    })
            ])
        ]));
    }
}
