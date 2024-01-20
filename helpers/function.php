<?php

use Sokeio\Admin\Facades\Menu;

if (!function_exists('menu_render')) {
    function menu_render($_position = '')
    {
        return Menu::render($_position);
    }
}
