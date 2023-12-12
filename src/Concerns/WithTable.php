<?php

namespace Sokeio\Admin\Concerns;

trait WithTable
{
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
