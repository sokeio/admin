<?php

namespace Sokeio\Admin\Components;

use Illuminate\Support\Traits\Macroable;
use Sokeio\Admin\Components\Concerns\WithCommon;
use Sokeio\Admin\Components\Concerns\WithLayout;
use Sokeio\Admin\Components\Concerns\WithField;

class UI
{
    public const KEY_FIELD_NAME = '###______###';
    use Macroable, WithLayout, WithCommon, WithField;
}
