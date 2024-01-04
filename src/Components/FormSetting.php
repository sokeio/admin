<?php

namespace Sokeio\Admin\Components;

use Sokeio\Admin\Components\Concerns\WithForm;
use Sokeio\Component;
use Sokeio\Facades\Theme;

class FormSetting extends Component
{
    use  WithForm;
    protected function getView()
    {
        if ($this->currentIsPage()) {
            Theme::setTitle($this->getTitle());
            breadcrumb()->Title($this->getTitle())->Breadcrumb($this->getBreadcrumb());
            return 'admin::components.form.setting';
        }
        return 'admin::components.form.index';
    }
    public function loadData()
    {
        if (method_exists($this, 'loadDataAfter')) {
            call_user_func([$this, 'loadDataAfter']);
        }
    }
}
