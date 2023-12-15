<?php

namespace Sokeio\Admin\Components\Commons;

use Sokeio\Admin\Components\Base;

class Tab extends Base
{
    protected function __construct($value)
    {
        parent::__construct($value);
    }
    public function boot()
    {
        if (!$this->tabs && ($tabs = $this->getTabs())) {
            foreach ($tabs as $item) {
                if (isset($item['content'])) {
                    if (is_array($item['content'])) {
                        foreach ($item['content'] as $column) {
                            $column->Manager($this->getManager());
                            $column->boot();
                        }
                    } else {
                        $item['content']->Manager($this->getManager());
                        $item['content']->boot();
                    }
                }
            }
        }
    }
    private $tabs = [];
    public function getTabs()
    {
        return $this->tabs;
    }
    public function addTab($content, $title = '', $icon = '', $active = false)
    {
        $this->tabs[] = [
            'content' => $content,
            'title' => $title,
            'icon' => $icon,
            'active' => $active == true
        ];
        return $this;
    }
    public function getView()
    {
        return 'admin::components.commons.tab';
    }
}
