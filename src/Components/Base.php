<?php

namespace Sokeio\Admin\Components;

use Sokeio\Laravel\BaseCallback;

class Base extends BaseCallback
{
    public function boot()
    {
    }
    protected function __construct($value)
    {
    }
    public static function Make($value)
    {
        return (new static($value));
    }
    public function Attribute($Attribute)
    {
        return $this->setKeyValue('Attribute', $Attribute);
    }
    public function getAttribute()
    {
        return $this->getValue('Attribute');
    }

    public function ClassName($ClassName)
    {
        return $this->setKeyValue('ClassName', $ClassName);
    }
    public function getClassName()
    {
        return $this->getValue('ClassName');
    }
    public function getView()
    {
    }
}
