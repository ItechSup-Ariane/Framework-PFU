<?php

/**
 * The base element contain the main élément for all widget
 */

namespace ItechSup\Form\Widget;

use ItechSup\Form\Widget;
use ItechSup\Form\View\ViewElementWidget;
use ItechSup\Validator\Validator\Validator;

abstract class BaseWidgetElement extends Widget
{

    protected $label;
    protected $value;
    protected $type;
    protected $render;
    protected $listLabelAttribut = array();
    protected $listStrErrorAttribut;
    protected $isGroupWidget = false;
    protected $isMappable = false;
    private $validator;

    /**
     * get the label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * set the label
     * @param name's label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * get the value
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * set the value
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * set the validator
     * @param Validator $validator
     */
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * get the validator
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * get the type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * get a view object
     * @return ViewElementWidget
     */
    protected function getViewElement($value, array $error = [])
    {
        if (empty($this->label)) {
            $this->label = $this->name;
        }
        $view = new ViewElementWidget($value, $this->label, $error);
        $view->setLabelAttr($this->listStrErrorAttribut);
        $view->setErrorsAttr($this->listStrErrorAttribut);
        return $view;
    }

    /**
     * get list label's attribut
     * @return array
     */
    public function getLabelAttributs()
    {
        return $this->listLabelAttribut;
    }

    /**
     * set list label's attribut
     * @param array $listAttribut
     */
    public function setLabelAttributs(array $listAttribut)
    {
        $this->listLabelAttribut = array_merge($this->listLabelAttribut, $listAttribut);
    }

    /**
     * clear list label's attribut
     * @param array $listAttribut
     */
    public function clearLabelAttributs()
    {
        $this->listLabelAttribut = array();
    }

    /**
     * get a attribut
     * @param string $nameAttr
     */
    public function getLabelAttribut($nameAttr)
    {
        return $this->listLabelAttribut[$nameAttr];
    }

    /**
     * set a attribut
     * @param string $nameAttr name's attribut
     * @param string $valueAttr value's attribut
     */
    public function setLabelAttribut($nameAttr, $valueAttr)
    {
        return $this->listLabelAttribut[$nameAttr] = $valueAttr;
    }

    /**
     * check if a attribut exist
     * @return boolean
     */
    public function hasLabelAttribut($nameAttr)
    {
        return isset($this->listLabelAttribut[$nameAttr]);
    }

    /**
     * remove a attribut
     * @param string name's attribut
     */
    public function removeLabelAttribut($nameAttr)
    {
        return isset($this->listLabelAttribut[$nameAttr]);
    }

    /**
     * prepare the list's attribut for the widget
     */
    protected function prepareAttribut()
    {
        parent::prepareAttribut();
        foreach ($this->listLabelAttribut as $attr => $value) {
            $this->listStrErrorAttribut .= " " . $attr . "='" . $value . "'";
        }
    }

    /**
     * valid the widget
     * @return boolean
     */
    public function isValid()
    {
        $isValid = true;
        if (!empty($this->validator)) {
            $isValid = $this->validator->isValid($this->value);
        }
        return $isValid;
    }

    /**
     * build the render for the widget
     * @return ViewElementWidget
     */
    abstract public function getRenderWidget();
}
