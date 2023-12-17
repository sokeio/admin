<?php

namespace Sokeio\Admin\Components\Field\Concerns;

trait WithFieldBase
{
    public function Name($Name)
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
    }
    public function Placeholder($Placeholder)
    {
        return $this->setKeyValue('Placeholder', $Placeholder);
    }
    public function getPlaceholder()
    {
        return $this->getValue('Placeholder');
    }
    public function Format($Format)
    {
        return $this->setKeyValue('Format', $Format);
    }
    public function getFormat()
    {
        return $this->getValue('Format');
    }
    public function getFormField()
    {
        if ($this->checkPrex()) return $this->getPrex() . '.' . $this->getName();
        return $this->getName();
    }
    private $fieldValueCallback = null;
    public function FieldValue($callback)
    {
        $this->fieldValueCallback = $callback;
        return $this;
    }
    public function getFieldValue($row)
    {
        if ($this->fieldValueCallback) return call_user_func($this->fieldValueCallback, $row, $this, $this->getManager());
        return data_get($row, $this->getName());
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
    public function Label($Label)
    {
        return $this->setKeyValue('Label', $Label);
    }
    public function getLabel()
    {
        return $this->getValue('Label');
    }
}
