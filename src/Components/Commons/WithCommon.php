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
    public static function Container($value)
    {
        return Container::make($value);
    }
    public static function Prex($prex, $value)
    {
        return Container::make($value)->Prex($prex);
    }
}
