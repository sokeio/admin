<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Breadcrumb;

trait WithModelQuery
{
    public function getTitle()
    {
    }
    protected function getModel()
    {
    }
    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return ($this->getModel())::query();
    }
    private $columns = [];
    public function addColumn($column)
    {
        $this->columns[] = $column;
        return $this;
    }
    /**
     * Get a new query builder for the model's table.
     *
     *
     * @return \Sokeio\Admin\Components\Field\BaseField[]
     */
    protected function getColumns()
    {
        return  $this->columns;
    }
}
