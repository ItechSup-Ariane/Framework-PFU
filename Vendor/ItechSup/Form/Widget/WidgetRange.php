<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

class WidgetRange extends BaseWidgetElement
{

    protected $type = "text";
    protected $isMappable = true;

    public function getRenderWidget()
    {
        if (empty($this->render)) {
            $field = "<input name='" . $this->name
                    . "' value='" . $this->value
                    . "' type='" . $this->type . "' "
                    . $this->listStrAttribut
                    . " />";
            $this->render = $this->getViewElement($field, $this->getValidator()->getListErrors());
        }
        return $this->render;
    }

}
