<?php

namespace Sokeio\Admin\Components\Common;


class Action extends BaseCommon
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
    public function getView()
    {
        return 'admin::components.common.row';
    }
}
