<?php

namespace Sokeio\Admin\Components;

use Sokeio\Admin\Concerns\WithForm;
use Sokeio\Admin\Concerns\WithModelQuery;
use Sokeio\Component;

class Form extends Component
{
    use WithModelQuery, WithForm;
}
