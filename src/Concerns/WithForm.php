<?php

namespace Sokeio\Admin\Concerns;

use Sokeio\Form;

trait WithForm
{
    use WithModelQuery;
    public $dataId;
    public $copyId;
    public Form $data;
    private $layout;

    public function loadData()
    {
        $query = $this->getQuery();
        if ($this->dataId) {
            $query =  $query->where('id', $this->dataId);
        } else if ($this->copyId) {
            $query =  $query->where('id', $this->copyId);
        }
        $data = $query->first();
        $this->data->fill($data);
    }
    protected function getRules()
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

    public function doSave()
    {
        $this->getColumns();
    }
    public function boot()
    {
        if (!$this->layout) {
            $this->layout = $this->getLayout();
            if (!$this->layout) return null;
            if (is_object($this->layout)) {
                $this->layout = [$this->layout];
            }
            foreach ($this->layout as $item) {
                if ($item) {
                    $item->Manager($this);
                    $item->boot();
                }
            }
        }
    }
    public function mount()
    {
        $this->loadData();
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle(),
            'layout' => $this->layout
        ]);
    }
}
