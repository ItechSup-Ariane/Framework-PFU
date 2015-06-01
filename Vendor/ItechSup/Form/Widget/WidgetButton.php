<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

abstract class WidgetButton extends BaseWidgetElement {

    protected $type = "button";
    protected $isMappable = false;

    public function getRender() {
        if (empty($this->render)) {
            $field = "<input type='" . $this->type . "'";
            foreach ($this->listAttribut as $attr => $value) {
                $field .= " " . $attr . "='" . $value . "'";
            }
            $field .= "/>";
            $this->render = $this->getViewElement($field, $this->name, null);
        }
        return $this->render;
    }

}
