<?php

namespace Sokeio\Admin;

use Livewire\Component;
use Sokeio\Form as FormBase;

class DataForm extends FormBase
{
    function __construct(
        Component $component,
        $propertyName
    ) {
        parent::__construct($component, $propertyName);
        $this->InitForm();
    }
    protected $itemManager;
    public function setItemManager($itemManager)
    {
        $this->itemManager = $itemManager;
        if ($this->itemManager)
            $this->itemManager->Data(function () {
                return $this;
            });
        return $this;
    }
    protected $___enableBindData = false;
    public $___checkProperty =  false;
    public function InitForm()
    {
        if (method_exists($this->component, 'getItemManager')) {
            $this->itemManager = $this->component->getItemManager();
            $this->itemManager->Data(function () {
                return $this;
            });
            if (!!$this->itemManager) {
                if (method_exists($this->itemManager, 'getItems')) {
                    foreach ($this->itemManager->getItems() as $item) {
                        if ($item->getWhen()) {
                            $this->{$item->getField()} =  $item->getValueDefault();
                        }
                    }
                }
            }
        }
    }
    public function FillData($data)
    {
        if ($this->itemManager && method_exists($this->itemManager, 'getItems')) {
            foreach ($this->itemManager->getItems() as $item) {
                if ($item->getWhen() && !$item->getNoBindData()) {
                    $this->{$item->getField()} = $data->{$item->getField()} ? $data->{$item->getField()} : $item->getValueDefault();
                }
            }
        } else if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }
}
