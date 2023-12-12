<?php

namespace Sokeio\Admin\Concerns;

use Sokeio\Form;

trait WithForm
{
    public Form $data;
    public function getRules()
    {
        return null;
    }
    protected function getView()
    {
        return 'admin::components.form.index';
    }
    public function getLayout()
    {
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle(),
            'columns' => $this->getLayout()
        ]);
    }
}
