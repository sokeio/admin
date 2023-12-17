<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Admin\Components\Field\TextField;

trait WithField
{
    public static function Text($value)
    {
        return TextField::make($value);
    }
}