<?php

namespace Sokeio\Admin\Components\Field;


class ImageField extends BaseField
{
    public function Mutil($Mutil = true): static
    {
        return $this->setKeyValue('Mutil', $Mutil);
    }
    public function getMutil()
    {
        return $this->getValue('Mutil');
    }
    public function getFieldView()
    {
        return 'admin::components.field.image';
    }
}
