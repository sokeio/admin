<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Sokeio\Facades\Locale;

class Languages extends Component
{
    public function doSwtich($locale)
    {
        Locale::switchLocale($locale);
        return $this->redirectCurrent();
    }
    public function render()
    {
        return viewScope('admin::languages', [
            'locales' => Locale::supportedLocales(),
            'currentLocale' => Locale::currentLocale()
        ]);
    }
}
