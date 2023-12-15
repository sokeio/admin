<?php

namespace Sokeio\Admin\Components\Commons;


class Box extends BaseCommon
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
   
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
    public function getView()
    {
        return 'admin::components.commons.box';
    }
}
