<?php

namespace ItechSup\Form;

abstract class Widget {

    protected $name;
    protected $listAttribut = array();
    protected $listStringAttribut = "";
    protected $listErrorAttribut = array();
    protected $listStringErrorAttribut = "";

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAttributs() {
        return $this->listAttribut;
    }

    public function setAttributs(array $listAttribut) {
        $this->listAttribut = array_merge($this->listAttribut, $listAttribut);
    }

    public function clearAttributs() {
        $this->listAttribut = array();
    }

    public function getAttribut($nameAttr) {
        return $this->listAttribut[$nameAttr];
    }

    public function setAttribut($nameAttr, $valueAttr) {
        return $this->listAttribut[$nameAttr] = $valueAttr;
    }

    public function hasAttribut($nameAttr) {
        return isset($this->listAttribut[$nameAttr]);
    }

    public function removeAttribut($nameAttr) {
        return isset($this->listAttribut[$nameAttr]);
    }

    public function getErrorAttributs() {
        return $this->listErrorAttribut;
    }

    public function setErrorAttributs(array $listAttribut) {
        $this->listErrorAttribut = array_merge($this->listErrorAttribut, $listAttribut);
    }

    public function clearErrorAttributs() {
        $this->listErrorAttribut = array();
    }

    public function getErrorAttribut($nameAttr) {
        return $this->listErrorAttribut[$nameAttr];
    }

    public function setErrorAttribut($nameAttr, $valueAttr) {
        return $this->listErrorAttribut[$nameAttr] = $valueAttr;
    }

    public function hasErrorAttribut($nameAttr) {
        return isset($this->listErrorAttribut[$nameAttr]);
    }

    public function removeErrorAttribut($nameAttr) {
        return isset($this->listErrorAttribut[$nameAttr]);
    }

    protected function prepareAttribut() {
        foreach ($this->listAttribut as $attr => $value) {
            $this->listStringAttribut .= " " . $attr . "='" . $value . "'";
        }
        foreach ($this->listErrorAttribut as $attr => $value) {
            $this->listStringErrorAttribut .= " " . $attr . "='" . $value . "'";
        }
    }

    abstract public function isValid();
}
