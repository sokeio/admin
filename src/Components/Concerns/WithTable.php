<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Admin\Components\UI;
use Sokeio\Facades\Theme;
// use Livewire\Attributes\Url;
use Sokeio\Form;

trait WithTable
{
    use WithModelQuery, WithPagination;

    private $searchlayout;
    private $tablecolumns;
    // #[Url]
    public Form $search;
    public Form $orderBy;
    public  $pageSize = 10;
    protected function getPageName()
    {
        return 'page';
    }
    protected function getPageSize()
    {
        return [5, 10, 15, 30, 50, 100];
    }

    protected function searchFields()
    {
        return ['name'];
    }
    public function doSort($name)
    {
        if (isset($this->orderBy->{$name})) {
            $this->orderBy->{$name} = $this->orderBy->{$name} == 0;
        } else {
            $this->orderBy->Clear();
            $this->orderBy->{$name} = 1;
        }
    }
    protected function getButtons()
    {
        return [];
    }
    public function doSearch()
    {
    }
    protected function searchUI()
    {
    }
    public function boot()
    {
        if (!$this->searchlayout) {
            $this->searchlayout = $this->searchUI();
            if (!$this->searchlayout) return null;

            if (is_object($this->searchlayout)) {
                $this->searchlayout = [$this->searchlayout];
            }
            $this->searchlayout = [UI::Prex('search', $this->searchlayout)];
            foreach ($this->searchlayout as $item) {
                if ($item) {
                    $item->Manager($this);
                    $item->boot();
                }
            }
        }
        if (!$this->tablecolumns) {
            $this->tablecolumns = $this->getColumns();
            if (!$this->tablecolumns) return null;

            if (is_object($this->tablecolumns)) {
                $this->tablecolumns = [$this->tablecolumns];
            }
            foreach ($this->tablecolumns as $item) {
                if ($item) {
                    $item->Manager($this);
                    $item->boot();
                }
            }
        }
    }
    protected function getView()
    {
        if ($this->currentIsPage()) {
            Theme::setTitle($this->getTitle());
            breadcrumb()->Title($this->getTitle())->Breadcrumb($this->getBreadcrumb());
            return 'admin::components.table.page';
        }
        return 'admin::components.table.index';
    }
    protected function getData()
    {
        $query = $this->getQuery();
        if ($textSearch = $this->search->textSearch) {
            $query->orWhere(function ($subquery) use ($textSearch) {
                foreach ($this->searchFields() as $field) {
                    $subquery->where($field, 'like', '%' . $textSearch . '%');
                }
            });
        }
        $orderBy = $this->orderBy->toArray();
        if (count(($orderBy))) {
            foreach ($orderBy as $key => $value) {
                if ($value == 1) {
                    $query->orderBy($key, 'desc');
                } else {
                    $query->orderBy($key, 'asc');
                }
            }
        }
        return  $query->paginate($this->pageSize, ['*'], $this->getPageName(), $this->getPage($this->getPageName()));
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle(),
            'buttons' => $this->getButtons(),
            'searchlayout' => $this->searchlayout,
            'datatable' => $this->getData(),
            'tablecolumns' => $this->tablecolumns,
            'pageSizes' => $this->getPageSize()
        ]);
    }
}
