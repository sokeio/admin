<?php

namespace Sokeio\Admin\Components\Fields;

use Sokeio\Laravel\BaseCallback;

class BaseField extends BaseCallback
{
    protected function __construct($value)
    {
        $this->Name($value);
    }
    public static function Make($value)
    {
        return (new static($value));
    }
    public function Prex($Prex)
    {
        return $this->setKeyValue('Prex', $Prex);
    }
    public function getPrex()
    {
        return $this->getValue('Prex');
    }
    public function AttributeBox($AttributeBox)
    {
        return $this->setKeyValue('AttributeBox', $AttributeBox);
    }
    public function getAttributeBox()
    {
        return $this->getValue('AttributeBox');
    }
    public function Attribute($Attribute)
    {
        return $this->setKeyValue('Attribute', $Attribute);
    }
    public function getAttribute()
    {
        return $this->getValue('Attribute');
    }
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
    public function Name($Name)
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
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
