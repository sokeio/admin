<?php

namespace Sokeio\Admin\Components\Common\Concerns;

trait WithButtonWire
{
    public function WireClick($WireClick)
    {
        return $this->setKeyValue('WireClick', $WireClick);
    }
    public function getWireClick()
    {
        return $this->getValue('WireClick');
    }
    
    public function getWireAttribute()
    {
        $attr = '';
        if ($WireClick = $this->getWireClick()) {
            $attr .= ' wire:click="' . $WireClick . '" ';
        }
        return  $attr;
    }
}
