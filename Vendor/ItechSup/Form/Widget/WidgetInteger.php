<?php

namespace ItechSup\Form\Widget;

class WidgetInteger extends BaseWidgetElement
{
    protected $type = 'number';
    protected $isMappable = true;

    public function getRenderWidget()
    {
        if (empty($this->render)) {
            $field = "<input name='".$this->name
                    ."' value='".$this->value
                    ."' type='".$this->type."' "
                    .$this->listStrAttribut
                    .' />';
            $this->render = $this->getViewElement($field, $this->getValidator()->getListErrors());
        }

        return $this->render;
    }
}
