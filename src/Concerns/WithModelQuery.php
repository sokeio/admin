<?php

namespace Sokeio\Admin\Concerns;

use Sokeio\Models\User;

trait WithModelQuery
{
    public function getTitle()
    {
    }
      /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {
        return ($this->getModel())::query();
    }
    private $columns = [];
    public function addColumn($column)
    {
        $this->columns[] = $column;
        return $this;
    }
    public function getColumns()
    {
    }
}
