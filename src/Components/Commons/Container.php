<?php

namespace Sokeio\Admin\Components\Commons;


class Container extends BaseCommon
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
    public function getView()
    {
        return 'admin::components.commons.container';
    }
}
