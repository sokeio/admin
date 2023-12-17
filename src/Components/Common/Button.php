<?php

namespace Sokeio\Admin\Components\Common;


class Button extends BaseCommon
{
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
    public function getView()
    {
        return 'admin::components.commons.button';
    }
}
