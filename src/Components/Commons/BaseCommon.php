<?php

namespace Sokeio\Admin\Components\Commons;

use Sokeio\Admin\Components\Base;

class BaseCommon extends Base
{
    protected function __construct($value)
    {
        $this->Content($value);
    }
    public function boot()
    {
        if (!($content = $this->getContent())) {
            foreach ($content as $item) {
                if ($item) {
                    $item->Manager($this->getManager());
                    $item->boot();
                }
            }
        }
    }
    public function Content($Content)
    {
        return $this->setKeyValue('Content', $Content);
    }
    public function getContent()
    {
        return $this->getValue('Content');
    }
    public function AttributeBox($AttributeBox)
    {
        return $this->setKeyValue('AttributeBox', $AttributeBox);
    }
    public function getAttributeBox()
    {
        return $this->getValue('AttributeBox');
    }
}
