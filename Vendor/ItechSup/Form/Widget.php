<?php

namespace ItechSup\Form;

abstract class Widget {

    protected $name;
    protected $listAttribut = array();

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAttributs(array $listAttribut) {
        $this->listAttribut = array_merge($this->listAttribut, $listAttribut);
    }

    public function getAttributs() {
        return $this->listAttribut;
    }

    public function getAttribut($nameAttr) {
        return $this->listAttribut[$nameAttr];
    }

    public function hasAttribut($nameAttr) {
        return isset($this->listAttribut[$nameAttr]);
    }

    public function setAttribut($nameAttr, $valueAttr) {
        return $this->listAttribut[$nameAttr] = $valueAttr;
    }
}
