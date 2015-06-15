<?php

namespace ItechSup\Form\View;

class ViewElementWidget
{
    private $value;
    private $label;
    private $errors;
    private $labelAttr;
    private $errorsAttr;

    public function __construct($value, $label, array $errors = [])
    {
        $this->value = $value;
        $this->label = $label;
        $this->errors = $errors;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getLabel()
    {
        return '<label '.$this->labelAttr.' >'.$this->label.'</label>';
    }

    public function getError()
    {
        $stringError = '';
        foreach ($this->errors as $error) {
            $stringError .= '<span'.$this->errorsAttr.' >'.$error.'</span>';
        }

        return $stringError;
    }

    public function getLabelAttr()
    {
        return $this->labelAttr;
    }

    public function getErrorsAttr()
    {
        return $this->errorsAttr;
    }

    public function setLabelAttr($labelAttr)
    {
        $this->labelAttr = $labelAttr;
    }

    public function setErrorsAttr($errorsAttr)
    {
        $this->errorsAttr = $errorsAttr;
    }

    public function __toString()
    {
        //return $this->label . $this->value . $this->error;
    }
}
