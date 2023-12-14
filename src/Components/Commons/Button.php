<?php

namespace Sokeio\Admin\Components\Commons;


<<<<<<< Updated upstream:src/Components/Fields/ButtonField.php
class ButtonField extends BaseContentField
=======
class Button extends BaseCommon
>>>>>>> Stashed changes:src/Components/Commons/Button.php
{
    public function Title($Title)
    {
        return $this->setKeyValue('Title', $Title);
    }
    public function getTitle()
    {
        return $this->getValue('Title');
    }
    public function Name($Name)
    {
        return $this->setKeyValue('Name', $Name);
    }
    public function getName()
    {
        return $this->getValue('Name');
    }
    public function getView()
    {
        return 'admin::components.fields.button';
    }
}
