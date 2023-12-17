<?php

namespace Sokeio\Admin\Components\Field;

use Sokeio\Admin\Components\Base;
use Sokeio\Admin\Components\Field\Concerns\WithFieldBase;
use Sokeio\Admin\Components\Field\Concerns\WithFieldRule;
use Sokeio\Admin\Components\Field\Concerns\WithFieldWire;

class BaseField extends Base
{
    use WithFieldWire, WithFieldRule, WithFieldBase;
    public function boot()
    {
        $this->getManager()?->addColumn($this);
        parent::boot();
    }
    protected function __construct($value)
    {
        $this->Name($value);
    }
}
