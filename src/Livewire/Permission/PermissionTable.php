<?php

namespace Sokeio\Admin\Livewire\Permission;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Sokeio\Admin\Components\Table;
use Sokeio\Admin\Components\UI;
use Sokeio\Models\Permission;

class PermissionTable extends Table
{
    public function getTitle()
    {
        return __('Permission');
    }
    public function LoadPermission()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
        $listRoutes = Route::getRoutes()->getRoutes();

        $IGNORES = apply_filters(PLATFORM_PERMISSION_IGNORE, []);
        foreach ($listRoutes as $item) {
            if (($name = $item->getName()) && ($middlewares = $item->gatherMiddleware())) {
                if (!str_starts_with($name, '_') && (count($IGNORES) == 0 || !in_array($name, $IGNORES))) {
                    foreach ($middlewares as $mid) {
                        if (is_a($mid, \Illuminate\Auth\Middleware\Authenticate::class, true)) {
                            Permission::query()->create([
                                'name' => $name, 'group' => $name, 'slug' => $name
                            ]);
                        }
                    }
                }
            }
        }
        $customes = apply_filters(PLATFORM_PERMISSION_CUSTOME, []);
        if ($customes && count($customes)) {
            foreach ($customes as $name) {
                if (count($IGNORES) == 0 || !in_array($name, $IGNORES))
                    Permission::query()->create([
                        'name' => $name, 'group' => $name, 'slug' => $name
                    ]);
            }
        }
        $this->showMessage(__('Update Permission success'));
    }
    protected function getModel()
    {
        return Permission::class;
    }
    public function getButtons()
    {
        return [
            UI::Button(__('Load Permission'))->ClassName('bg-warning')->WireClick('LoadPermission()')
        ];
    }
    public function getTableActions()
    {
        return [];
    }
    // public function showSearchUI(){
    //     return true;
    // }
    // public function searchUI()
    // {
    //     return [
    //         UI::Row([
    //             UI::Column6([
    //                 UI::Text('name')->LIKE()->Label('Tên Role')
    //             ])
    //         ])

    //     ];
    // }

    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Name')),
            UI::Text('slug')->Label(__('Slug'))
        ];
    }
}
