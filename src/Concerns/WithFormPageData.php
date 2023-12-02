<?php

namespace Sokeio\Admin\Concerns;

trait WithFormPageData
{
    use WithFormData;
    public function getView()
    {
        return 'admin::forms.page';
    }
    public function render()
    {
        return view('admin::forms.page', [
            'itemManager' => $this->getItemManager(),
            'page_title' => $this->getItemManager()?->getTitle()
        ]);
    }
}
