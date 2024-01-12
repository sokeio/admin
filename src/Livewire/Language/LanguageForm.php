<?php

namespace Sokeio\Admin\Livewire\Language;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Models\Language;

class LanguageForm extends Form
{
    public function getTitle()
    {
        return __('Language');
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
        return Language::class;
    }
    public function FormUI()
    {
        return UI::Container([
            UI::Prex(
                'data',
                [
                    UI::Row([
                        UI::Column12([
                            UI::Text('name')->Label(__('Name'))->required()
                        ]),
                        UI::Column12([
                            UI::Text('code')->Label(__('Code'))
                        ]),
                        UI::Column12([
                            UI::Text('flag')->Label(__('Flag'))
                        ]),
                        UI::Column12([
                            UI::Checkbox('status')->Label(__('Status'))->Title(__('Active'))
                        ]),
                    ]),
                ]
            ),
        ])

            ->ClassName('p-3');
    }
}
