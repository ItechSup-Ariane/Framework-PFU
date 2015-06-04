<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget\BaseWidgetElement;

class ChoiceWidget extends BaseWidgetElement {

    private $choiceTypes = array("checkbox", "select", "radio");
    private $choiceValue;
    private $isMultipe = false;
    protected $render = array();

    public function setChoiceValue() {
        $this->choiceValue = array_merge($this->choiceValue, $choiceValue);
    }

    public function setMultipe($isMultipe) {
        $this->isMultipe = $isMultipe;
    }

    public function setExpanded($isExpanded) {
        $this->isExpanded = $isExpanded;
    }

    public function getRenderWidget() {
        
    }

}
