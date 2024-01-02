<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithDatasource;

class RadioMutilField extends BaseField
{
    use WithDatasource;
    public function getFieldView()
    {
        return 'admin::components.field.radio-multiple';
    }
}
