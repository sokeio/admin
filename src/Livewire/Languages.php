<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Sokeio\Facades\Locale;

class Languages extends Component
{
    public function DoSwtich($locale)
    {
        Locale::SwitchLocale($locale);
        return $this->redirectCurrent();
    }
    public function render()
    {
        return view_scope('admin::languages', [
            'locales' => Locale::SupportedLocales(),
            'currentLocale' => Locale::CurrentLocale()
        ]);
    }
}
