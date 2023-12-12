<?php

namespace Sokeio\Admin\Components\Fields;


class RowField extends BaseField
{
    protected function __construct($value)
    {
        $this->Columns($value);
    }
    public function Columns($Columns)
    {
        return $this->setKeyValue('Columns', $Columns);
    }
    public function getColumns()
    {
        return $this->getValue('Columns');
    }
    public function getView()
    {
        return 'admin::components.fields.row';
    }
}
