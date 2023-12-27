<?php

namespace Sokeio\Admin\Setting;


class SettingManager
{
    private $settings = [];
    public function Tab($ui, $key = 'overview', $title = 'Overview')
    {
        if (!isset($this->settings[$key])) {
            $this->settings[$key] = [
                'ui' => [],
                'key' => $key,
                'title' => $title
            ];
        }
        if (is_callable($ui)) {
            $ui = call_user_func($ui, $this->settings[$key]['ui']);
        }
        if (is_object($ui)) {
            $ui = [$ui];
        }
        $this->settings[$key]['ui'] = [
            ...$this->settings[$key]['ui'],
            ...$ui
        ];
    }
}
