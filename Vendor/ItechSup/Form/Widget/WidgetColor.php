<?php

namespace ItechSup\Form\Widget;

abstract class WidgetColor extends BaseWidgetElement
{
    protected $type = 'button';
    protected $isMappable = false;

    public function getRenderWidget()
    {
        if (empty($this->render)) {
            $field = "<input name='".$this->name
                    ."' value='".$this->value
                    ."' type='".$this->type."' "
                    .$this->listStrAttribut
                    .' />';
            $this->render = $this->getViewElement($field);
        }

        return $this->render;
    }
}
