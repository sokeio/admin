<?php

namespace Sokeio\Admin\Components\Fields;


class BaseContentField extends BaseField
{
    protected function __construct($value)
    {
        $this->Content($value);
    }
    public function boot(){
        if(! ($content=$this->getContent())) {
            foreach ($content as $item) {
                if($item){
                    $item->Manager($this->getManager());
                    $item->boot();
                }
            }
        }
    }
    public function Content($Content)
    {
        return $this->setKeyValue('Content', $Content);
    }
    public function getContent()
    {
        return $this->getValue('Prex');
    }
    public function AttributeBox($AttributeBox)
    {
        return $this->setKeyValue('AttributeBox', $AttributeBox);
    }
    public function getAttributeBox()
    {
        return $this->getValue('AttributeBox');
    }
}
