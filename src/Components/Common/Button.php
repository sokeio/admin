<?php

namespace Sokeio\Admin\Components\Common;

use Sokeio\Admin\Components\Common\Concerns\WithButtonSoke;
use Sokeio\Admin\Components\Common\Concerns\WithButtonWire;

class Button extends BaseCommon
{
    use WithButtonWire, WithButtonSoke;
    protected function __construct($value)
    {
        $this->Title($value);
    }
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
    public function Name($Name)
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
    }
    public function Link($Link)
    {
        return $this->setKeyValue('Link', $Link);
    }
    public function getLink()
    {
        return $this->getValue('Link');
    }

    public function Route($name, $paramOrcallback = [])
    {
        return $this->Link(function ($item, $manager) use ($name, $paramOrcallback) {
            if ($paramOrcallback && is_callable($paramOrcallback)) {
                $paramOrcallback = call_user_func($paramOrcallback, $item->getDataItem(), $item, $manager);
            }
            return route($name, $paramOrcallback);
        });
    }
    public function getView()
    {
        return 'admin::components.common.button';
    }
}
