<?php

namespace Sokeio\Admin\Livewire\User;

use Illuminate\Support\Facades\Password;
use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Models\User;

class UserChangePasswordForm extends Form
{
    public function getTitle()
    {
        return __('User');
    }
    public function getBreadcrumb()
    {
        return [
            Breadcrumb::Item(__('Home'), route('admin.dashboard'))
        ];
    }
    public function getButtons()
    {
        return [];
    }
    public function getModel()
    {
        return User::class;
    }
    public $password_old;
    public $password_new;
    protected function doValidate()
    {
        parent::doValidate();
    }
    public function FormUI()
    {
        return
            UI::Div(
                UI::Row([
                    UI::Column12([
                        UI::Password('password_old')->Label(__('Password Old'))->required(),
                        UI::Password('password_new')->Label(__('Password New'))->required(),
                        // UI::Button(__('Test'))->Attribute('@click="$wire.callActionUI(\'test\')"')->actionUI('test', function ($component) {
                        //     $component->showMessage('test');
                        // }),
                    ]),

                ])
            )->ClassName('p-3');
    }
}
