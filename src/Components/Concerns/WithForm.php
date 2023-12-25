<?php

namespace Sokeio\Admin\Components\Concerns;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Sokeio\Admin\Components\UI;
use Sokeio\Facades\Theme;
use Sokeio\Form;

trait WithForm
{
    use WithModelQuery;
    public $dataId;
    #[Url]
    public $copyId;
    public Form $data;
    private $layout;
    private $footer;
    protected function formMessage($isNew)
    {
        if ($isNew) return __('New record created successfully');
        return __('The record updated successfully');
    }
    public function loadData()
    {
        $query = $this->getQuery();
        if ($this->dataId) {
            $query =  $query->where('id', $this->dataId);
            $data = $query->first();
            if (!$data) return abort(404);
            $this->data->fill($data);
        } else if ($this->copyId) {
            $query =  $query->where('id', $this->copyId);
            $data = $query->first();
            $this->data->fill($data);
        }
    }
    protected function FormRules()
    {
        $rules = [];
        $messages = [];
        $attributes = [];
        foreach ($this->getColumns() as $column) {
            if ($column->checkRule()) {
                $rules[$column->getFormField()] = $column->getRules();
                $attributes[$column->getFormField()] = $column->getLabel();

                // $messages[$column->getFormField()] = $column->getMessages();
            }
        }
        return  ['rules' => $rules, 'messages' => $messages, 'attributes' => $attributes];
    }
    protected function getView()
    {
        if ($this->currentIsPage()) {
            Theme::setTitle($this->getTitle());
            breadcrumb()->Title($this->getTitle())->Breadcrumb($this->getBreadcrumb());
            return 'admin::components.form.page';
        }
        return 'admin::components.form.index';
    }
    protected function FormUI()
    {
    }
    protected function FooterUI()
    {
        return [
            UI::Div([
                UI::Button(__('Save'))->WireClick('doSave()')
            ])->ClassName('p-2 text-center')
        ];
    }
    public function doSave()
    {
        ['rules' => $rules, 'messages' => $messages, 'attributes' => $attributes] = $this->FormRules();
        // $this->showMessage(json_encode(['rules' => $rules, 'messages' => $messages, 'attributes' => $attributes]));
        // return;
        if ($rules && count($rules)) {
            $this->validate($rules, $messages, $attributes);
        }
        $objData = new ($this->getModel());
        $isNew = true;
        if ($this->dataId) {
            $isNew = false;
            $query = $this->getQuery();
            $query =  $query->where('id', $this->dataId);
            $objData = $query->first();
            if (!$objData) $objData = new ($this->getModel());
        }
        foreach ($this->getColumns() as $column) {
            data_set($objData, $column->getNameEncode(), data_get($this, $column->getFormFieldEncode()));
        }
        DB::transaction(function () use ($objData) {
            if (method_exists($this, 'saveBefore')) {
                call_user_func([$this, 'saveBefore'], $objData);
            }
            $objData->save();
            if (method_exists($this, 'saveAfter')) {
                call_user_func([$this, 'saveAfter'], $objData);
            }
        });
        $this->dataId = $objData->id;
        $this->showMessage($this->formMessage($isNew));
        if (!$this->CurrentIsPage()) {
            $this->refreshRefComponent();
            $this->closeComponent();
        }
    }
    public function boot()
    {
        if (!$this->layout) {
            $this->layout = $this->FormUI();
            if ($this->layout) {
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
        if (!$this->footer) {
            $this->footer = $this->FooterUI();
            if ($this->footer) {
                if (is_object($this->footer)) {
                    $this->footer = [$this->footer];
                }
                foreach ($this->footer as $item) {
                    if ($item) {
                        $item->Manager($this);
                        $item->boot();
                    }
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
            'layout' => $this->layout,
            'footer' => $this->footer
        ]);
    }
}
