<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Admin\Components\Common\Button;
use Sokeio\Admin\Components\Common\Card;
use Sokeio\Admin\Components\Common\Container;
use Sokeio\Admin\Components\Common\Tab;

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
    public static function Button($value){
        return Button::Make($value);
    }
}