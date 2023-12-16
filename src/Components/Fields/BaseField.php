<?php

namespace Sokeio\Admin\Components\Fields;

use Sokeio\Admin\Components\Base;

class BaseField extends Base
{
    public function boot()
    {
        $this->getManager()?->addColumn($this);
        parent::boot();
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
    public function getWireAttribute()
    {
        $attr = 'wire:model';
        $attr .= ($this->wireModelArr[$this->wireModelType]);
        switch ($this->wireModelType) {
            case 3: //debounce
                $attr .= '.' . $this->wireModelDebounce;
                break;
            case 4: //throttle
                $attr .= '.' . $this->wireModelThrottle;
                break;
        }
        $attr .= '="' . $this->getFormField() . '" ';
        return $attr;
    }
    /*
    0-default
    1-live
    2-blur
    3-debounce
    4-throttle
    */
    private $wireModelArr = ['', '.live', '.blur', '.live.debounce', '.live.throttle'];
    private $wireModelType = 0;
    private $wireModelDebounce = '150ms';
    private $wireModelThrottle = '150ms';
    public function WireLive()
    {
        $this->wireModelType = 1;
        return $this;
    }
    public function WireBlur()
    {
        $this->wireModelType = 2;
        return $this;
    }
    public function WireLiveDebounce($value = '150ms')
    {
        $this->wireModelType = 3;
        $this->wireModelDebounce = $value;
        return $this;
    }
    public function WireLiveThrottle($value = '150ms')
    {
        $this->wireModelType = 4;
        $this->wireModelThrottle = $value;
        return $this;
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
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
}
