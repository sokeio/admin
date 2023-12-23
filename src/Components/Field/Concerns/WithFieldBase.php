<?php

namespace Sokeio\Admin\Components\Field\Concerns;

trait WithFieldBase
{
    protected const KEY_FIELD_NAME = '###______###';
    public static function getFieldName($fieldEncode)
    {
        return str_replace(self::KEY_FIELD_NAME, '.', $fieldEncode);
    }
    public function Name($Name): static
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
    }
    public function getNameEncode()
    {
        return self::getFieldName($this->getName());
    }
    public function Placeholder($Placeholder): static
    {
        return $this->setKeyValue('Placeholder', $Placeholder);
    }
    public function getPlaceholder()
    {
        return $this->getValue('Placeholder');
    }
    public function Format($Format): static
    {
        return $this->setKeyValue('Format', $Format);
    }
    public function getFormat()
    {
        return $this->getValue('Format');
    }
    public function getFormFieldEncode()
    {
        return self::getFieldName($this->getFormField());
    }
    public function getFormField()
    {
        if ($this->checkPrex()) {
            $operator = $this->getOperatorField();
            return $this->getPrex() . '.' . ($operator != '' ?  $operator . '.' : '') . str_replace('.', self::KEY_FIELD_NAME, $this->getName());
        }
        return $this->getName();
    }
    private $fieldValueCallback = null;
    public function FieldValue($callback): static
    {
        $this->fieldValueCallback = $callback;
        return $this;
    }
    public function getFieldValue($row)
    {
        if ($this->fieldValueCallback) return call_user_func($this->fieldValueCallback, $row, $this, $this->getManager());
        return data_get($row, $this->getName());
    }

    public function AttributeInput($AttributeInput): static
    {
        return $this->setKeyValue('AttributeInput', $AttributeInput);
    }
    public function getAttributeInput()
    {
        return $this->getValue('AttributeInput');
    }
    public function ClassInput($ClassInput): static
    {
        return $this->setKeyValue('ClassInput', $ClassInput);
    }
    public function getClassInput()
    {
        return $this->getValue('ClassInput');
    }
    public function AttributeLabel($AttributeLabel): static
    {
        return $this->setKeyValue('AttributeLabel', $AttributeLabel);
    }
    public function getAttributeLabel()
    {
        return $this->getValue('AttributeLabel');
    }
    public function ClassLabel($ClassLabel): static
    {
        return $this->setKeyValue('ClassLabel', $ClassLabel);
    }
    public function getClassLabel()
    {
        return $this->getValue('ClassLabel');
    }
    public function Label($Label): static
    {
        return $this->setKeyValue('Label', $Label);
    }
    public function getLabel()
    {
        return $this->getValue('Label');
    }
}
