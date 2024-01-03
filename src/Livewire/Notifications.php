<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

class Notifications extends Component
{
    public $title = 'Last updates';
    public $notifications = [];
    public $page = 1;
    public $showNewNotification = false;
    #[Reactive]
    public $showIcon = true;
    #[On('echo:notifications,NotificationAdd')]
    public function notifyNew()
    {
        $this->showNewNotification = true;
    }
    public function mount()
    {
    }
    public function testData()
    {
        notification()->Title('test')->send();
        notification()->Title('test2')->send();
        notification()->Title('test3')->send();
        notification()->Title('test4')->send();
        notification()->Title('test5')->send();
        notification()->Title('test5')->send();
        notification()->Title('test6')->send();
        notification()->Title('test7')->send();
        notification()->Title('test8')->send();
        $this->skipRender();
    }
    public function loadMore()
    {



        $this->skipRender();
        $this->page = $this->page + 1;
        return notification()->Render($this->page - 1);
    }
    public function render()
    {
        return view_scope('admin::notifications');
    }
}
