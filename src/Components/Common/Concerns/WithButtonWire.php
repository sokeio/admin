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
    private $wireConfirm;
    public function WireConfirm($message, $title, $yes = 'Yes', $no = 'No')
    {
        $this->wireConfirm = [
            'message' => $message,
            'title' => $title,
            'yes' => $yes,
            'no' => $no,
        ];
        return $this;
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
