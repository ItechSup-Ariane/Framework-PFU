<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

class WidgetCheckBox extends BaseWidgetElement
{

    protected $type = "checkbox";
    protected $isMappable = true;

    public function getRenderWidget()
    {
        if (empty($this->render)) {
            $isChecked = "";
            if ($this->type) {
                $isChecked = "checked";
            }
            $field = "<input name='" . $this->name
                    . "' value='true'"
                    . " " . $isChecked
                    . "' type='" . $this->type . "' "
                    . $this->listStringAttribut
                    . " />";
            $errors = [];
            if (!empty($this->getValidator())) {
                $errors = $this->getValidator()->getListErrors();
            }
            $this->render = $this->getViewElement($field, $errors);
        }
        return $this->render;
    }

}
