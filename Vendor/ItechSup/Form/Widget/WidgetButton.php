<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

abstract class WidgetButton extends BaseWidgetElement
{

    protected $type = "button";
    protected $isMappable = false;

    public function getRenderWidget()
    {
        if (empty($this->render)) {
            $field = "<input name='" . $this->name
                    . "' value='" . $this->value
                    . "' type='" . $this->type . "' "
                    . $this->listStringAttribut
                    . " />";
            $this->render = $this->getViewElement($field);
        }
        return $this->render;
    }

}
