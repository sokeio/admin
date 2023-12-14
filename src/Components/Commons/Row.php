<?php

namespace Sokeio\Admin\Components\Commons;


<<<<<<< Updated upstream:src/Components/Fields/RowField.php
class RowField extends BaseContentField
=======
class Row extends BaseCommon
>>>>>>> Stashed changes:src/Components/Commons/Row.php
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
