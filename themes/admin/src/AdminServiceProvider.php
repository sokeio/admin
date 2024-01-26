<?php

namespace SokeioTheme\Admin;

use Illuminate\Support\ServiceProvider;
use Sokeio\Laravel\ServicePackage;
use Sokeio\Admin\Menu\MenuBuilder;
use Sokeio\Admin\Menu\MenuItemBuilder;
use Sokeio\Admin\Facades\Menu;
use Sokeio\Concerns\WithServiceProvider;
use Sokeio\Admin\Facades\SettingForm;
use Sokeio\Facades\Theme;
use Sokeio\Admin\Item;

class AdminServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('theme')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function configurePackaged()
    {
    }
    public function extending()
    {
    }
    public function packageRegistered()
    {
        $this->extending();
    }
    private function bootGate()
    {
    }
    public function packageBooted()
    {
        $this->bootGate();

      
    }
}
