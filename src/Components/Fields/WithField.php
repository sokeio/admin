<?php

namespace Sokeio\Admin\Components\Fields;

trait WithField
{
    public static function Text($value)
    {
        return TextField::make($value);
    }
}