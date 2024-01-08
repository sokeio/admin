<?php

namespace Sokeio\Admin\Livewire;

use Sokeio\Component;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class LogsViewer extends Component
{
    public $file = 0;
    public $page = 1;
    public $total;
    public $perPage = 500;
    public $paginator;

    protected $queryString = ['page'];

    public function render()
    {

        $files = $this->getLogfiles();

        $log = collect(file($files[$this->file]->getPathname(), FILE_IGNORE_NEW_LINES));

        $this->total = intval(floor($log->count() / $this->perPage)) + 1;

        $log = $log->slice(($this->page - 1) * $this->perPage, $this->perPage)->values();

        return view('admin::logs-viewer.index', [
            'files' => $files,
            'log' => $log,
            ''
        ]);
    }

    protected function getLogFiles()
    {
        $directory = storage_path('logs');

        return collect(File::allFiles($directory))
            ->sortByDesc(function (SplFileInfo $file) {
                return $file->getMTime();
            })->values();
    }

    public function goto($page)
    {
        $this->page = $page;
    }

    public function updatingFile()
    {
        $this->page = 1;
    }
}
