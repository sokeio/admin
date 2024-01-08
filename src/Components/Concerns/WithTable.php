<?php

namespace Sokeio\Admin\Components\Concerns;

use Livewire\Attributes\Reactive;
use Sokeio\Admin\Components\Field\BaseField;
use Sokeio\Admin\Components\UI;
use Sokeio\Facades\Theme;
// use Livewire\Attributes\Url;
use Sokeio\Form;

trait WithTable
{
    use WithModelQuery, WithTablePagination;
    use WithLayoutUI;

    public $lazyloadingTable = true;
    private $searchlayout;
    private $tablecolumns;
    private $tableActions;
    // #[Url]
    public $selectIds = [];
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
            if (method_exists($this, 'removeBefore') && !$this->removeBefore($record)) {
                return;
            }
            // Delete the record
            $record->delete();

            if (method_exists($this, 'removeAfter') && !$this->removeAfter($record)) {
                return;
            }
            // Record successfully deleted
            $this->showMessage(__("The record has been deleted successfully."));
        } else {
            // Record not found
            $this->showMessage(__("The record does not exist."));
        }
    }
    protected function getRoute()
    {
        return '';
    }
    protected function getButtons()
    {
        return [
            UI::ButtonCreate(__('Create'))->ModalRoute($this->getRoute() . '.add')->ModalTitle(__('Create Data'))
        ];
    }

    //The record has been deleted successfully.
    public function getTableActions()
    {
        return [
            UI::ButtonEdit(__('Edit'))->ModalRoute($this->getRoute() . '.edit', function ($row) {
                return [
                    'dataId' => $row->id
                ];
            })->ModalTitle(__('Edit Data')),
            UI::ButtonRemove(__('Remove'))->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
                return 'doRemove(' . $item->getDataItem()->id . ')';
            })
        ];
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
            $this->searchlayout = $this->reLayout(UI::Prex('search', $this->searchUI()));
        }
        if (!$this->tableActions) {
            $this->tableActions = $this->reLayout($this->getTableActions());
        }
        if (!$this->tablecolumns) {
            $this->tablecolumns = $this->reLayout($this->getColumns());
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
