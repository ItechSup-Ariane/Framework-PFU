<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget;
use ItechSup\Form\View\ViewElementWidget;
use ItechSup\Validator\Validator\Validator;

abstract class BaseWidgetElement extends Widget {

    protected $value;
    protected $type;
    protected $render;
    protected $isMappable;
    private $validator;

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setValidator(Validator $validator) {
        $this->validator = $validator;
    }

    public function getValidator() {
        return $this->validator;
    }

    public function getType() {
        return $this->type;
    }

    public function isMappable() {
        return $this->isMappable;
    }

    protected function getViewElement($value, $label, array $error = null) {
        return new ViewElementWidget($value, $label, $error);
    }

    abstract public function getRender();
}
