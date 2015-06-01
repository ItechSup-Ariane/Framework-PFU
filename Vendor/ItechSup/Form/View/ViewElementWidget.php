<?php

namespace ItechSup\Form\View;

class ViewElementWidget {

    private $value;
    private $label;
    private $error;

    public function __construct($value, $label, array $error = null) {
        $this->value = $value;
        $this->label = $label;
        $this->error = $error;
    }

    public function getValue() {
        return $this->value;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getError() {
        return $this->error;
    }

    public function __toString() {
        return $this->label . $this->value . $this->error;
    }

}
