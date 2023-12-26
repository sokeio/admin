<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Field\Concerns\WithDatasource;

class ToggleMutilField extends BaseField
{
    use WithDatasource;
    public function getView()
    {
        return 'admin::components.field.toggle-multiple';
    }
}
