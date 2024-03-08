<?php

namespace Sokeio\Admin;

use Illuminate\Support\Facades\Request;
use Sokeio\Admin\Widgets\WidgetServiceProvider;
use Sokeio\Facades\Menu;
use Sokeio\Menu\MenuBuilder;
use Illuminate\Support\ServiceProvider;
use Sokeio\Laravel\ServicePackage;
use Sokeio\Concerns\WithServiceProvider;
use Sokeio\Facades\Platform;
use Sokeio\Facades\Theme;

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
            ->name('admin')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function packageRegistered()
    {
        $this->app->register(WidgetServiceProvider::class);
        Platform::ready(function () {
            if (sokeioIsAdmin()) {
                if (Theme::SiteDataInfo()) {
                    add_action('THEME_ADMIN_RIGHT', function () {
                        echo '<div class="nav-item">
                        <a class="nav-link fw-bold" target="_blank" href="' . url('/') . '">' . __('Go to Site') . '</a>
                        </div>';
                    });
                }
                Menu::Register(function () {
                    menuAdmin()
                        ->route('admin.dashboard', __('Dashboard'), '<i class="ti ti-dashboard fs-2"></i>', [], '', 1)
                        ->subMenu(__('User'), '<i class="ti ti-user-shield fs-2"></i>', function (MenuBuilder $menu) {
                            $menu->setTargetId('user_menu');
                            $menu->route([
                                'name' => 'admin.system.user',
                                'params' => []
                            ], __('User'), '', [], 'admin.system.user');
                            $menu->route(
                                ['name' => 'admin.system.role', 'params' => []],
                                __('Role'),
                                '',
                                [],
                                'admin.system.role'
                            );
                            $menu->route([
                                'name' => 'admin.system.permission',
                                'params' => []
                            ], __('Permission'), '', [], 'admin.system.permission');
                        }, 9999999999999)
                        ->subMenu(__('Appearance'), '<i class="ti ti-brush fs-2"></i>', function (MenuBuilder $menu) {
                            $menu->setTargetId('system_appearance_menu');
                            $menu->route(
                                [
                                    'name' => 'admin.extension.theme',
                                    'params' => []
                                ],
                                'Theme',
                                '',
                                [],
                                'admin.extension.theme'
                            );
                            if (themeOption()->checkOptionUI()) {
                                $menu->route([
                                    'name' => 'admin.extension.theme.option',
                                    'params' => []
                                ], 'Theme Option', '', [], 'admin.extension.theme.option');
                            }
                            if (Theme::SiteDataInfo()) {
                                $menu->route([
                                    'name' => 'admin.extension.theme.menu',
                                    'params' => []
                                ], 'Menu', '', [], 'admin.extension.theme.menu');
                            }
                        }, 9999999999999)
                        ->subMenu('Settings', '<i class="ti ti-settings fs-2"></i>', function (MenuBuilder $menu) {
                            $menu->setTargetId('system_setting_menu');
                            $menu->route('admin.setting.general', 'System', '', [], 'admin.setting.general');
                            $menu->route('admin.system.tools', 'Tool System', '', [], 'admin.system.tools');
                            $menu->route('admin.system.language', 'Language', '', [], 'admin.system.language');

                            $menu->route('admin.system.log-viewer', 'Log', '', [], 'admin.system.log-viewer');
                            $menu->route([
                                'name' => 'admin.extension.module',
                                'params' => []
                            ], 'Module', '', [], 'admin.extension.module');
                            $menu->route(
                                ['name' => 'admin.extension.plugin', 'params' => []],
                                'Plugin',
                                '',
                                [],
                                'admin.extension.plugin'
                            );
                        }, 99999999999999);
                });
                Platform::readyAfter(function () {
                    Menu::doRegister();
                });
            }
        });
    }
    private function bootGate()
    {
        if (!$this->app->runningInConsole()) {
            add_filter(PLATFORM_PERMISSION_IGNORE, function ($prev) {
                return [
                    'admin.dashboard',
                    'admin.system.user-change-password-form',
                    'admin.profile',
                    ...$prev
                ];
            });
            add_filter(PLATFORM_PERMISSION_CUSTOME, function ($prev) {
                return [
                    'admin.system.user-change-status',
                    'admin.system.role-change-status',
                    'admin.system.permission-load-data',
                    ...$prev
                ];
            });
        }
    }
    public function packageBooted()
    {
        $this->bootGate();
    }
}
