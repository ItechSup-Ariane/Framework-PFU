<?php

namespace ItechSup\Form;

use ItechSup\Form\GroupWidget;
use ItechSup\Form\Exception\FormException;

class Form extends GroupWidget {

    public function openForm() {
        $form = '<form';

        foreach ($this->listAttribut as $attr => $value) {
            $form .= " " . $attr . "='" . $value . "'";
        }
        $form .= '>';
        return $form;
    }

    public function closeForm() {
        return '</form>';
    }

    public function getRender($nameWidget) {
        if ($this->hasWidget($nameWidget)) {
            $render = $this->listWidget[$nameWidget]->getRender();
        } else {
            if (empty($render)) {
                throw new FormException($nameWidget . ' element view not exist');
            }
        }
        return $render;
    }

}
