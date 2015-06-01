<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

class WidgetInteger extends BaseWidgetElement {

    protected $type = "number";
    protected $isMappable = true;

    public function getRender() {
        if (empty($this->render)) {
            $field = "<input name='" . $this->name . "' value='" . $this->value . "' type='" . $this->type . "'";
            foreach ($this->listAttribut as $attr => $value) {
                $field .= " " . $attr . "='" . $value . "'";
            }
            $field .= "/>";
            $this->render = $this->getViewElement($field, $this->name, $this->getValidator()->getListErrors());
        }
        return $this->render;
    }

}
