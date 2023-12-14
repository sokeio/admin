<?php

namespace Sokeio\Admin\Components\Commons;


<<<<<<< Updated upstream:src/Components/Fields/ColumnField.php
class ColumnField extends BaseContentField
=======
class Column extends BaseCommon
>>>>>>> Stashed changes:src/Components/Commons/Column.php
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
