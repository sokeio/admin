<?php

namespace Sokeio\Admin\Components\Fields;

use Sokeio\Admin\Components\Base;

class BaseField extends Base
{
    public function boot()
    {
        $this->getManager()?->addColumn($this);
    }
    protected function __construct($value)
    {
        $this->Name($value);
    }
    public function Name($Name)
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
    }
    public function Prex($Prex)
    {
        return $this->setKeyValue('Prex', $Prex);
    }
    public function getPrex()
    {
        return $this->getValue('Prex');
    }
    public function AttributeInput($AttributeInput)
    {
        return $this->setKeyValue('AttributeInput', $AttributeInput);
    }
    public function getAttributeInput()
    {
        return $this->getValue('AttributeInput');
    }
    public function ClassInput($ClassInput)
    {
        return $this->setKeyValue('ClassInput', $ClassInput);
    }
    public function getClassInput()
    {
        return $this->getValue('ClassInput');
    }
    public function AttributeLabel($AttributeLabel)
    {
        return $this->setKeyValue('AttributeLabel', $AttributeLabel);
    }
    public function getAttributeLabel()
    {
        return $this->getValue('AttributeLabel');
    }
    public function ClassLabel($ClassLabel)
    {
        return $this->setKeyValue('ClassLabel', $ClassLabel);
    }
    public function getClassLabel()
    {
        return $this->getValue('ClassLabel');
    }
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
}
