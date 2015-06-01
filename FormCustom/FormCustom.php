<?php

namespace FormCustom;

use ItechSup\Form\Form;
use ItechSup\Form\Widget\WidgetSubmit;
use FormCustom\PersonneGroupWidget;

class FormCustom extends Form {

    public function __construct($dataMap) {
        $attributForm = ["id" => "test_form",
            "class" => "test_class",
            "action" => "",
            "method" => "POST"];
        $this->setAttributs($attributForm);
        $personneGroupWidget = new PersonneGroupWidget($dataMap);
        $personneGroupWidget->setName("personneGroupWidget");
        $widgetSubmit = new WidgetSubmit();
        $widgetSubmit->setName("button");
        $widgetSubmit->setValue("button");

        $this->addWidget($widgetSubmit, 'button');
        $this->addWidget($personneGroupWidget, 'personneGroupWidget');
    }

}
