<?php

namespace Sokeio\Admin\Components;

use Illuminate\Support\Traits\Macroable;
use Sokeio\Admin\Components\Fields\BoxField;
use Sokeio\Admin\Components\Fields\ColumnField;
use Sokeio\Admin\Components\Fields\RowField;
use Sokeio\Admin\Components\Fields\TextField;

class Field
{
    use Macroable;
    public static function Text($value)
    {
        return TextField::make($value);
    }
    public static function Box($value)
    {
        return BoxField::make($value);
    }
    public static function Row($value)
    {
        return RowField::make($value);
    }
    public static function Column($value)
    {
        return ColumnField::make($value);
    }
    public static function Column1($value)
    {
        return ColumnField::make($value);
    }
    public static function Column2($value)
    {
        return ColumnField::make($value);
    }
    public static function Column3($value)
    {
        return ColumnField::make($value);
    }
    public static function Column4($value)
    {
        return ColumnField::make($value);
    }
    public static function Column5($value)
    {
        return ColumnField::make($value);
    }
    public static function Column6($value)
    {
        return ColumnField::make($value);
    }
    public static function Column7($value)
    {
        return ColumnField::make($value);
    }
    public static function Column8($value)
    {
        return ColumnField::make($value);
    }
    public static function Column9($value)
    {
        return ColumnField::make($value);
    }
    public static function Column10($value)
    {
        return ColumnField::make($value);
    }
    public static function Column11($value)
    {
        return ColumnField::make($value);
    }
    public static function Column12($value)
    {
        return ColumnField::make($value);
    }
}
