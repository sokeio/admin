<?php

namespace Sokeio\Admin\Components\Fields;

use Sokeio\Laravel\BaseCallback;

class BaseField extends BaseCallback
{
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
