<?php

namespace Sokeio\Admin\Widgets;

use Sokeio\Admin\Dashboard\Widget;

class UserTotalWidget extends Widget
{
    public function __construct($key)
    {
        parent::__construct($key);
        $this->Name(__('User Total'));
    }
}
