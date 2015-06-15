<?php

namespace ItechSup\Form;

use ItechSup\Form\Exception\FormException;

class Form extends GroupWidget
{
    private $listRender = array();
    private $isPrepare = false;

    public function openForm()
    {
        if ($this->isPrepare) {
            $form = '<form'.$this->listStrAttribut.'>';

            return $form;
        }
        throw new FormException('The form '.get_class($this).'is not prepare');
    }

    public function closeForm()
    {
        if ($this->isPrepare) {
            return '</form>';
        }
        throw new FormException('The form '.get_class($this).'is not prepare');
    }

    public function prepare()
    {
        $this->prepareAttribut();
        if ($this->isPrepare) {
            throw new FormException('The form '.get_class($this).' is already prepare');
        }
        foreach ($this->listWidget as $widget) {
            $widget->prepareAttribut();
            $this->listRender[$widget->getName()] = $widget->getRenderWidget();
        }
        $this->isPrepare = true;
    }

    public function getRender($nameWidget)
    {
        if ($this->isPrepare) {
            if (array_key_exists($nameWidget, $this->listRender)) {
                return $this->listRender[$nameWidget];
            }
            throw new FormException('The widget\'s name '.$nameWidget.' is not exists');
        }
        throw new FormException('The form '.get_class($this).' is not prepare');
    }
}
