<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithDatasource;

class CheckboxMutilField extends BaseField
{
    use WithDatasource;
    public function getFieldView()
    {
        return 'admin::components.field.checkbox-multiple';
    }
}
