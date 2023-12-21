<?php

namespace Sokeio\Admin\Components\Common;


class ButtonList extends BaseCommon
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
    public function getView()
    {
        return 'admin::components.common.button-list';
    }
}
