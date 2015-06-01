<?php

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget;
use ItechSup\Form\View\ViewElementWidget;
use ItechSup\Validator\Validator\Validator;

abstract class BaseWidgetElement extends Widget {

    protected $label;
    protected $value;
    protected $type;
    protected $render;
    protected $isMappable;
    protected $listLabelAttribut = array();
    protected $listStringLabelAttribut;
    private $validator;

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($value) {
        $this->label = $value;
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

    protected function getViewElement($value, array $error = []) {
        if (!empty($this->label)) {
            $label = $this->label;
        } else {
            $label = $this->name;
        }
        $view = new ViewElementWidget($value, $label, $error);
        return $view;
    }

    public function getLabelAttributs() {
        return $this->listLabelAttribut;
    }

    public function setLabelAttributs(array $listAttribut) {
        $this->listLabelAttribut = array_merge($this->listAttribut, $listAttribut);
    }

    public function clearLabelAttributs() {
        $this->listLabelAttribut = array();
    }

    public function getLabelAttribut($nameAttr) {
        return $this->listLabelAttribut[$nameAttr];
    }

    public function setLabelAttribut($nameAttr, $valueAttr) {
        return $this->listLabelAttribut[$nameAttr] = $valueAttr;
    }

    public function hasLabelAttribut($nameAttr) {
        return isset($this->listLabelAttribut[$nameAttr]);
    }

    public function removeLabelAttribut($nameAttr) {
        return isset($this->listLabelAttribut[$nameAttr]);
    }

    protected function prepareAttribut() {
        parent::prepareAttribut();
        foreach ($this->listLabelAttribut as $attr => $value) {
            $this->listStringLabelAttribut .= " " . $attr . "='" . $value . "'";
        }
    }

    abstract public function getRenderWidget();
}
