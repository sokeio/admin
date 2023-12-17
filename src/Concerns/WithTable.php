<?php

namespace Sokeio\Admin\Concerns;

trait WithTable
{
    use WithModelQuery;
    protected function getView()
    {
        return 'admin::components.table.index';
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle()
        ]);
    }
}
