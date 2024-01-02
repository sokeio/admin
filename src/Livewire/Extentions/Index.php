<?php

namespace Sokeio\Admin\Livewire\Extentions;

use Sokeio\Breadcrumb;
use Sokeio\Component;
use Sokeio\Facades\Theme;

class Index extends Component
{
    public $ExtentionType;
    public $viewType = 'manager';
    public function switchStore()
    {
        $this->viewType = 'store';
    }
    public function switchManager()
    {
        $this->viewType = 'manager';
    }
    public function switchUpload()
    {

        $this->viewType = 'upload';
    }
    public function getTitle()
    {
        return str($this->ExtentionType)->studly();
    }
    public function render()
    {
        Theme::setTitle($this->getTitle());
        breadcrumb()->Title($this->getTitle())->Breadcrumb([
            Breadcrumb::Item(__('Home'), route('admin.dashboard'))
        ]);
        return view('admin::extentions.index', [
            'mode_dev' => sokeio_mode_dev(),
            'page_title' => $this->getTitle()
        ]);
    }
}
