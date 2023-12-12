<?php

namespace Sokeio\Admin\Components\Fields;


class ColumnField extends BaseField
{
    protected function __construct($value)
    {
        $this->Columns($value)->Name('col');
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
        return 'admin::components.fields.column';
    }
}
