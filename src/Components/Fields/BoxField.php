<?php

namespace Sokeio\Admin\Components\Fields;


class BoxField extends BaseContentField
{
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
        return 'admin::components.fields.box';
    }
}
