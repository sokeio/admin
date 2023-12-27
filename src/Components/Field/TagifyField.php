<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithFieldOption;

class TagifyField extends BaseField
{
    use WithFieldOption;
    public function getView()
    {
        return 'admin::components.field.tagify';
    }
}
