<?php

namespace Sokeio\Admin\Components\Field;

class RadioField extends BaseField
{
    public function getWireAttribute()
    {
        $attr = parent::getWireAttribute();


        if (data_get($this->getManager(), $this->getFormField())) {
            $attr .= ' checked ';
        }
        $attr .= ' value="' . $this->getCheckboxValue() . '" ';
        return $attr;
    }
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
    public function CheckboxValue($CheckboxValue)
    {
        return $this->setKeyValue('CheckboxValue', $CheckboxValue);
    }
    public function getCheckboxValue()
    {
        return $this->getValue('CheckboxValue', 1);
    }
    public function getView()
    {
        return 'admin::components.field.radio';
    }
}
