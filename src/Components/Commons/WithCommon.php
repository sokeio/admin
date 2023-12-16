<?php

namespace Sokeio\Admin\Components\Commons;

trait WithCommon
{

    public static function Tab()
    {
        return Tab::make('');
    }
    public static function Card($value)
    {
        return Card::make($value);
    }
    
}
