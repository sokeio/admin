<?php

namespace Sokeio\Admin\Components;

use Illuminate\Support\Traits\Macroable;
use Sokeio\Admin\Components\Commons\WithCommon;
use Sokeio\Admin\Components\Commons\WithLayout;
use Sokeio\Admin\Components\Fields\WithField;

class UI
{
    use Macroable, WithLayout, WithCommon, WithField;
}
