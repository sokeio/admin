<?php

namespace Sokeio\Admin;


class ItemForms extends DataForm
{
    public function BindData($arr)
    {
        foreach ($arr as $item) {
            $proForm = self::FormId($item->id);
            if (!isset($this->___templateData[$proForm])) {
                $dataForm = new ItemForm($this->component, $this->getPropertyName() . '.' . $proForm);
                $this->itemManager->Data($item);
                $dataForm->setDataId($item->id)->DataToForm($item);
                $this->___templateData[$proForm] =  $dataForm;
            }
        }
    }
}
