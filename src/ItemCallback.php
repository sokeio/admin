<?php

namespace Sokeio\Admin;

use Sokeio\Concerns\WithHelpers;
use Sokeio\Laravel\BaseCallback;

class ItemCallback extends BaseCallback
{
    use WithHelpers;
    public function KeyItem($KeyItem)
    {
        return $this->setKeyValue('KeyItem', $KeyItem);
    }

    public function getKeyItem()
    {
        return $this->getValue('KeyItem', 'APP_COMMON');
    }

    public function Data($data)
    {
        return $this->setKeyValue('data', $data);
    }
    public function getData()
    {
        return $this->getValue('data');
    }
    public function ClassItem($ClassItem)
    {
        return $this->setKeyValue('ClassItem', $ClassItem);
    }

    public function getClassItem()
    {
        return $this->getValue('ClassItem');
    }
    public function ClassContent($ClassContent)
    {
        return $this->setKeyValue('ClassContent', $ClassContent);
    }

    public function getClassContent()
    {
        return $this->getValue('ClassContent');
    }
    public function Title($title)
    {
        return $this->setKeyValue('title', $title);
    }
    public function getTitle()
    {
        return $this->getValue('title');
    }

    public function Attribute($attribute)
    {
        return $this->setKeyValue('attribute', $attribute);
    }
    public function getAttribute()
    {
        return $this->getValue('attribute');
    }

    public function View($view)
    {
        return $this->setKeyValue('view', $view);
    }
    public function getView()
    {
        return $this->getValue('view');
    }

    public function When($when)
    {
        return $this->setKeyValue('when', $when);
    }
    public function getAttributeContent($class = '')
    {
        $attr = '  class="' . $class;
        if ($this->getManager() && $this->getManager() !== $this) {
            $attr = ' class="' . $this->getManager()->getClassItem() . " " . $class;
        }
        $attr .= ' ' . $this->getClassItem() . ' ' . $this->getClassContent() . ' " ' . $this->getAttribute();
        return trim($attr);
    }
    public function getWhen()
    {
        return $this->getValue('when');
    }
    public function NoBindData($NoBindData = null)
    {
        if ($NoBindData == null) {
            $NoBindData = function () {
                return true;
            };
        }
        return $this->setKeyValue('NoBindData', $NoBindData);
    }
    public function getNoBindData()
    {
        return $this->getValue('NoBindData');
    }

    public function Layout($layout)
    {
        return $this->setKeyValue('layout', $layout);
    }
    public function getLayout()
    {
        return $this->getValue('layout');
    }
    public static function New()
    {
        return new static();
    }
}