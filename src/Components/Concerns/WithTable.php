<?php

namespace Sokeio\Admin\Components\Concerns;

use Sokeio\Admin\Components\Field\BaseField;
use Sokeio\Admin\Components\UI;
use Sokeio\Facades\Theme;
// use Livewire\Attributes\Url;
use Sokeio\Form;

trait WithTable
{
    use WithModelQuery, WithTablePagination;

    public $lazyloadingTable = true;
    private $searchlayout;
    private $tablecolumns;
    private $tableActions;
    // #[Url]
    public  $selectids = [];
    public Form $search;
    public Form $orderBy;
    public $pageSize;
    protected function getPageName()
    {
        return 'page';
    }
    protected function getDefaultPageSize()
    {
        return 10;
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
    public function doRemove($id)
    {
        // Retrieve the record you want to delete
        $record = $this->getQuery()->find($id);

        if ($record) {
            // Delete the record
            $record->delete();

            // Record successfully deleted
            $this->showMessage(__("The record has been deleted successfully."));
        } else {
            // Record not found
            $this->showMessage(__("The record does not exist."));
        }
    }
    protected function getButtons()
    {
        return [];
    }
    protected function getTableActions()
    {
        return [];
    }
    public function doSearch()
    {
    }
    protected function searchUI()
    {
    }
    protected function ShowSearchUI()
    {
        return false;
    }
    public function booted()
    {
        if (!$this->pageSize)
            $this->pageSize = $this->getDefaultPageSize() ?? 10;
    }
    public function boot()
    {
        if (!$this->searchlayout) {
            $this->searchlayout = $this->searchUI();
            if ($this->searchlayout) {

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
        }

        if (!$this->tableActions) {
            $this->tableActions = $this->getTableActions();
            if ($this->tableActions) {
                if (is_object($this->tableActions)) {
                    $this->tableActions = [$this->tableActions];
                }
                foreach ($this->tableActions as $item) {
                    if ($item) {
                        $item->Manager($this);
                        $item->boot();
                    }
                }
            }
        }
        if (!$this->tablecolumns) {
            $this->tablecolumns = $this->getColumns();
            if ($this->tablecolumns) {
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
    protected function queryOperator($query)
    {
        $operator = $this->search->toArray();
        return BaseField::OperatorQuery($query, $operator);
    }
    protected function queryOrder($query)
    {
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
        return $query;
    }
    protected function getData()
    {
        if ($this->lazyloadingTable) return null;
        $query = $this->getQuery();
        if ($textSearch = $this->search->textSearch) {
            $query->orWhere(function ($subquery) use ($textSearch) {
                foreach ($this->searchFields() as $field) {
                    $subquery->where($field, 'like', '%' . $textSearch . '%');
                }
            });
        }
        $query = $this->queryOperator($query);
        $query = $this->queryOrder($query);
        return  $query->paginate($this->pageSize, ['*'], $this->getPageName(), $this->getPage($this->getPageName()));
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle(),
            'buttons' => $this->getButtons(),
            'searchlayout' => $this->searchlayout,
            'showSearchlayout' => $this->ShowSearchUI(),
            'datatable' => $this->getData(),
            'tablecolumns' => $this->tablecolumns,
            'pageSizes' => $this->getPageSize(),
            'tableActions' => $this->tableActions ?? []
        ]);
    }
}
