<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithDatasource;

class SelectField extends BaseField
{
    use WithDatasource;
    public function getView()
    {
        return 'admin::components.field.select';
    }
}
