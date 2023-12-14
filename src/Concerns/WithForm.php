<?php

namespace Sokeio\Admin\Concerns;

use Sokeio\Form;

trait WithForm
{
    public Form $data;
    private $layout;
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
    
    public function boot(){
        if(!$this->layout) {
            $this->layout=$this->getLayout();
            foreach ($this->layout as $item) {
                if($item){
                    $item->Manager($this);
                    $item->boot();
                }
            }
        }
    }
    public function render()
    {
        return view($this->getView(), [
            'title' => $this->getTitle(),
            'layout' => $this->layout
        ]);
    }
}
