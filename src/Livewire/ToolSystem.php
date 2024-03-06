<?php

namespace Sokeio\Admin\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Sokeio\Component;
use Sokeio\Facades\Assets;
use Sokeio\Facades\Platform;

class ToolSystem extends Component
{
    public function mount()
    {
        Assets::setTitle(__('Tool System'));
        breadcrumb()->Title(__('Tool System'))->Add(__('Home'), route('admin.dashboard'));
    }
    public function clearCache($message)
    {
        Cache::clear();
        $this->showMessage($message);
    }
    public function clearFolderAssetPlatform($message)
    {
        File::deleteDirectory(public_path('platform'));
        Platform::makeLink();
        $this->showMessage($message);
    }
    public function render()
    {
        return view('admin::tool-system.index', [
            'tools' => [
                [
                    'title' => __('Clear Cache'),
                    'action' => 'clearCache',
                    'description' => __('This feature will help you clear all stored caches.'),
                    'button' => __('Clear Cache'),
                    'button_color' => 'btn-danger',
                    'card_color' => 'bg-dark-lt',
                    'icon' => 'bi bi-trash',
                    'message' => __('Cache cleared'),
                ],
                [
                    'title' => __('Clear Asset Platform'),
                    'action' => 'clearFolderAssetPlatform',
                    'description' => __('This feature will help you clear folders all in platform.'),
                    'button' => __('Clear Platform Folder'),
                    'button_color' => 'btn-warning',
                    'card_color' => 'bg-dark-lt',
                    'icon' => 'bi bi-trash',
                    'message' => __('Folder asset platform cleared'),
                ]
            ]
        ]);
    }
}
