<?php

namespace ItechSup\Form;

use ItechSup\Form\Widget;
use ItechSup\Form\Exception\FormException;

/**
 * The GroupWidget contain widget or GroupWidget.
 */
class GroupWidget extends Widget
{

    private static $ARRAY = "array";
    private static $OBJ = "object";
    protected $listWidget;
    protected $dataMap;
    protected $typeDataMap;
    protected $isMappable = false;
    protected $isGroupWidget = true;

    /**
     * add a Widget object.
     * @param Widget $widget 
     * @param string $title
     * @return GroupWidget return the current object
     */
    public function addWidget(Widget $widget, $title)
    {
        $this->validNameWidget($widget->getName(), $title);
        if ($this->typeDataMap == self::$ARRAY && $widget->isMappable()) {
            $this->isMappedKeyArray($title);
        } elseif ($this->typeDataMap == self::$OBJ && $widget->isMappable()) {
            $this->isMappedGetterObject($title);
        }
        $this->listWidget[$title] = $widget;
        return $this;
    }

    /**
     * get a widget
     * @param string $title
     * @return Widget
     */
    public function getWidget($title)
    {
        return $this->listWidget[$title];
    }

    /**
     * check if a widget exist
     * @param string $title
     * @return Widget
     */
    public function hasWidget($title)
    {
        return isset($this->listWidget[$title]);
    }

    /**
     * remove a widget exist
     * @param string $title
     */
    public function removeWidget($title)
    {
        $this->listWidget[$title];
    }

    /**
     * clear the list widget
     * @param string $title
     */
    public function clearWidgets($title)
    {
        return $this->listWidget[$title];
    }

    /**
     * set a object or a array for map the data.
     * @param object|array $dataMap
     */
    public function setDataMap($dataMap)
    {
        $this->dataMap = $dataMap;
        if (is_array($dataMap)) {
            $this->typeDataMap = self::$ARRAY;
        } elseif (is_object($dataMap)) {
            $this->typeDataMap = self::$OBJ;
        }
    }

    /**
     * get the data with data mappad 
     * @return object|array
     */
    public function getData()
    {
        if ($this->typeDataMap == self::$OBJ) {
            $this->hydrateObject();
        } else {
            $this->hydrateArray();
        }
        return $this->dataMap;
    }

    /**
     * 
     */
    protected function isMappedKeyArray($key)
    {
        if (!array_key_exists($key, $this->dataMap)) {
            throw new FormException($key . " is not mapped in Array");
        }
    }

    /**
     * 
     */
    protected function isMappedGetterObject($getter)
    {
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

    /**
     * build a object with data mapped
     */
    protected function hydrateObject()
    {
        foreach ($this->listWidget as $widget) {
            $setter = "set" . ucfirst($widget->getName());
            if ($widget->isMappable()) {
                $this->dataMap->$setter($widget->getValue());
            } elseif ($widget->isGroupWidget()) {
                $this->dataMap->$setter($widget->getData());
            }
        }
    }

    /**
     * build a array with data mapped
     */
    protected function hydrateArray()
    {
        foreach ($this->listWidget as $widget) {
            if ($widget->isMappable()) {
                $this->dataMap[$widget->getName()] = $widget->getValue();
            } elseif ($widget->isGroupWidget()) {
                $this->dataMap[$widget->getName()] = $widget->getData();
            }
        }
    }

    /**
     * check if the name's widget is valid
     */
    protected function validNameWidget($nameWidget, $title)
    {
        if (!($nameWidget == $title)) {
            throw new FormException("The widget name and title is invalid");
        }
    }

    /**
     * set the bind data. The bind data is the value return by user
     * @param array
     */
    public function setBindData(array $request)
    {
        foreach ($this->listWidget as $widget) {
            if ($widget->isGroupWidget()) {
                $widget->setBindData($request);
            } elseif (array_key_exists($widget->getName(), $request)) {
                $widget->setValue($request[$widget->getName()]);
            }
        }
    }

    /**
     * get the list list with the widget render
     * @return array
     */
    public function getRenderWidget()
    {
        $listWidgetRender = array();
        foreach ($this->listWidget as $widget) {
            $widget->prepareAttribut();
            $listWidgetRender[$widget->getName()] = $widget->getRenderWidget();
        }
        return $listWidgetRender;
    }

    /**
     * check if the widget is valid
     * return boolean
     */
    public function isValid()
    {
        $isValid = true;
        foreach ($this->listWidget as $widget) {
            if (!$widget->isValid()) {
                $isValid = false;
            }
        }
        return $isValid;
    }

}
