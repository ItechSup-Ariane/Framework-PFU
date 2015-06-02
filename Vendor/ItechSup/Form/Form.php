<?php

namespace ItechSup\Form;

use ItechSup\Form\GroupWidget;
use ItechSup\Form\Exception\FormException;

class Form extends GroupWidget {

    private $listRender = array();
    private $isPrepare = false;

    public function openForm() {
        if ($this->isPrepare) {
            $form = '<form';

            foreach ($this->listAttribut as $attr => $value) {
                $form .= " " . $attr . "='" . $value . "'";
            }
            $form .= '>';
            return $form;
        } else {
            throw new FormException('The form ' . get_class($this) . 'is not prepare');
        }
    }

    public function closeForm() {
        return '</form>';
    }

    public function prepare() {
        if (!$this->isPrepare) {
            foreach ($this->listWidget as $widget) {
                $widget->prepareAttribut();
                $widget->setFormName(get_class($this));
                $this->listRender[$widget->getName()] = $widget->getRenderWidget();
            }
            $this->isPrepare = true;
        } else {
            throw new FormException('The form ' . get_class($this) . ' is already prepare');
        }
    }

    public function getRender($nameWidget) {
        if ($this->isPrepare) {
            if (array_key_exists($nameWidget, $this->listRender)) {
                return $this->listRender[$nameWidget];
            } else {
                throw new FormException('The widget\'s name ' . $nameWidget . ' is not exists');
            }
        } else {
            throw new FormException('The form ' . get_class($this) . ' is not prepare');
        }
    }

}
