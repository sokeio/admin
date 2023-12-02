<?php

use Sokeio\Facades\Platform;
use Sokeio\Admin\FieldView;
use Sokeio\Admin\Item;
use Sokeio\Admin\Widget;
use Sokeio\Facades\Action;

return [
    'name' => 'Admin',
    'commands' => [],
    'fields' => [
        FieldView::Create('text'),
        FieldView::Create('password'),
        FieldView::Create('images'),
        FieldView::Create('checkbox'),
        FieldView::Create('checkbox-multiple'),
        FieldView::Create('number'),
        FieldView::Create('flatpickr'),
        FieldView::Create('radio'),
        FieldView::Create('toggle'),
        FieldView::Create('subdomain'),
        FieldView::Create('toggle-multiple'),
        FieldView::Create('textarea'),
        FieldView::Create('tinymce'),
        FieldView::Create('select'),
        FieldView::Create('select-multiple'),
        FieldView::Create('tagify'),
        FieldView::Create('readonly'),
        FieldView::Create('choose-modal'),
    ],
    'shortcodes' => [],
    'actions' => [],
    'widgets' => []
];
