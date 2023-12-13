<?php

namespace Sokeio\Admin\Concerns;


trait WithModelQuery
{
    public function getTitle()
    {
    }
    public function getModel()
    {
    }
    public function getQuery()
    {
    }
    private $columns=[];
    public function addColumn($column){
        $this->columns[]=$column;
        return $this;
    }
    public function getColumns()
    {
    }
}
