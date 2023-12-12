<?php

namespace Sokeio\Admin\Components;

use Sokeio\Admin\Concerns\WithModelQuery;
use Sokeio\Admin\Concerns\WithTable;
use Sokeio\Component;

class Table extends Component
{
    use WithModelQuery, WithTable;
}
