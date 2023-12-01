<?php

namespace Sokeio\Admin\Dashboard;

use Sokeio\Platform\PlatformStatus;

class Widget
{
    private const DASHBOARD_WIDGET_STATUS = 'DASHBOARD_WIDGET_STATUS';
    public function __construct(protected $key)
    {
    }
    public function getKey()
    {
        return $this->key;
    }
    private function getStatus()
    {
        return PlatformStatus::Key(self::DASHBOARD_WIDGET_STATUS);
    }
    public function isActive()
    {
        return $this->getStatus()->Check($this->key);
    }

    public function Active()
    {
        return $this->getStatus()->Active($this->key);
    }

    public function UnActive()
    {
        return $this->getStatus()->UnActive($this->key);
    }
    private $action;
    public function Action($action)
    {
        $this->action = $action;
        return $this;
    }
    public function getAction()
    {
        return  $this->action;
    }
    private $params;
    public function Params($params)
    {
        $this->params = $params;
        return $this;
    }
    public function getParams()
    {
        return  $this->params;
    }
    private $name;
    public function Name($name)
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return  $this->name;
    }
}
