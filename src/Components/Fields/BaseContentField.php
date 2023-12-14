<?php

namespace Sokeio\Admin\Components\Fields;


class BaseContentField extends BaseField
{
    protected function __construct($value)
    {
        $this->Content($value);
    }
    public function Content($Content)
    {
        return $this->setKeyValue('Content', $Content);
    }
    public function getContent()
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
   
   
}
