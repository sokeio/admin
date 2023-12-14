<?php

namespace Sokeio\Admin\Components\Commons;


class Row extends BaseCommon
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
    public function getView()
    {
        return 'admin::components.commons.row';
    }
}

