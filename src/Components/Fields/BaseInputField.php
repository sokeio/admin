<?php

namespace Sokeio\Admin\Components\Fields;


class BaseInputField extends BaseField
{
    protected function __construct($value)
    {
        $this->Name($value);
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
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
   
}
