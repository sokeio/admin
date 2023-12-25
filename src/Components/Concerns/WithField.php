<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Admin\Components\Field\CheckboxField;
use Sokeio\Admin\Components\Field\CheckboxMutilField;
use Sokeio\Admin\Components\Field\PasswordField;
use Sokeio\Admin\Components\Field\RangeField;
use Sokeio\Admin\Components\Field\SelectField;
use Sokeio\Admin\Components\Field\TextareaField;
use Sokeio\Admin\Components\Field\TextField;

trait WithField
{
    public static function Text($value)
    {
        return TextField::make($value);
    }
    public static function Checkbox($value)
    {
        return CheckboxField::make($value);
    }
    public static function CheckboxMutil($value)
    {
        return CheckboxMutilField::make($value);
    }
    public static function Password($value)
    {
        return PasswordField::make($value);
    }
    public static function Select($value)
    {
        return SelectField::make($value);
    }
    public static function Textarea($value)
    {
        return TextareaField::make($value);
    }
    public static function Range($value)
    {
        return RangeField::make($value);
    }
}
