<?php

namespace ItechSup\Form;

use ItechSup\Form\Widget;
use ItechSup\Form\Exception\FormException;

class GroupWidget extends Widget {

    static private $ARRAY = "array";
    static private $OBJ = "object";
    protected $listWidget;
    protected $dataMap;
    protected $typeDataMap;
    protected $isMappable = false;
    protected $isGroupWidget = true;

    public function addWidget(Widget $widget, $title) {
        $this->validNameWidget($widget->getName(), $title);
        if ($this->typeDataMap == self::$ARRAY && $widget->isMappable()) {
            $this->isMappedKeyArray($title);
        } elseif ($this->typeDataMap == self::$OBJ && $widget->isMappable()) {
            $this->isMappedGetterObject($title);
        }
        $this->listWidget[$title] = $widget;
        return $this;
    }

    public function getWidget($title) {
        return $this->listWidget[$title];
    }

    public function hasWidget($title) {
        return isset($this->listWidget[$title]);
    }

    public function removeWidget($title) {
        return $this->listWidget[$title];
    }

    public function clearWidgets($title) {
        return $this->listWidget[$title];
    }

    public function setDataMap($dataMap) {
        $this->dataMap = $dataMap;
        if (is_array($dataMap)) {
            $this->typeDataMap = self::$ARRAY;
        } elseif (is_object($dataMap)) {
            $this->typeDataMap = self::$OBJ;
        }
    }

    public function getData() {
        if ($this->typeDataMap == self::$OBJ) {
            $this->hydrateObject();
        } else {
            $this->hydrateArray();
        }
        return $this->dataMap;
    }

    protected function isMappedKeyArray($key) {
        if (!array_key_exists($key, $this->dataMap)) {
            throw new FormException($key . " is not mapped in Array");
        }
    }

    protected function isMappedGetterObject($getter) {
        $isExists = false;
        $ucfGetter = ucfirst($getter);
        $listPrefixGetter = ["get", "is", "has"];
        foreach ($listPrefixGetter as $prefixGetter) {
            if (method_exists($this->dataMap, $prefixGetter . $ucfGetter)) {
                $isExists = true;
                break;
            }
        }
        if (!$isExists) {
            throw new FormException($getter . " is not mapped in " . get_class($this->dataMap));
        }
    }

    protected function hydrateObject() {
        foreach ($this->listWidget as $widget) {
            $setter = "set" . ucfirst($widget->getName());
            if ($widget->isMappable()) {
                $this->dataMap->$setter($widget->getValue());
            } elseif ($widget->isGroupWidget()) {
                $this->dataMap->$setter($widget->getData());
            }
        }
    }

    protected function hydrateArray() {
        foreach ($this->listWidget as $widget) {
            if ($widget->isMappable()) {
                $this->dataMap[$widget->getName()] = $widget->getValue();
            } elseif ($widget->isGroupWidget()) {
                $this->dataMap[$widget->getName()] = $widget->getData();
            }
        }
    }

    protected function validNameWidget($nameWidget, $title) {
        if (!($nameWidget == $title)) {
            throw new FormException("The widget name and title is invalid");
        }
    }

    public function setBindData(array $request) {
        foreach ($this->listWidget as $widget) {
            if ($widget->isGroupWidget()) {
                $widget->setBindData($request);
            } elseif (array_key_exists($widget->getName(), $request)) {
                $widget->setValue($request[$widget->getName()]);
            }
        }
    }

    public
            function getRenderWidget() {
        $listWidgetRender = array();
        foreach ($this->listWidget as $widget) {
            $widget->prepareAttribut();
            $listWidgetRender[$widget->getName()] = $widget->getRenderWidget();
        }
        return $listWidgetRender;
    }

    public
            function isValid() {
        $isValid = true;
        foreach ($this->listWidget as $widget) {
            if (!$widget->isValid()) {
                $isValid = false;
            }
        }
        return $isValid;
    }

}
