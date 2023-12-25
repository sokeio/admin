<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithDatasource;

class CheckboxMutilField extends BaseField
{
    use WithDatasource;
    public function getView()
    {
        return 'admin::components.field.checkbox-multiple';
    }
}
