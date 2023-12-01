<?php

namespace Sokeio\Admin\Widgets;

use Sokeio\Admin\Dashboard\Widget;

class RoleTotalWidget extends Widget
{
    public function __construct($key)
    {
        parent::__construct($key);
        $this->Name(__('Role Total'));
    }
}
