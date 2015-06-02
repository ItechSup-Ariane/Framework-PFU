<?php

namespace FormCustom;

use ItechSup\Form\Form;
use ItechSup\Form\Widget\WidgetSubmit;
use ItechSup\Form\Widget\WidgetText;
use FormCustom\PersonneGroupWidget;
use ItechSup\Validator\Constraint\ConstraintElement\ConstraintNotNull;
use ItechSup\Validator\Validator\Validator;

class FormCustom extends Form {

    public function __construct($dataMap) {
        $attributForm = ["id" => "test_form",
            "class" => "test_class",
            "action" => "",
            "method" => "POST"];
        $this->setAttributs($attributForm);

        $nomWidget = new WidgetText();
        $nomWidget->setName("title");
        $nomWidget->setLabel("Titre :");
        $validatorText = new Validator();
        $validatorText->addConstraint(new ConstraintNotNull());
        $nomWidget->setValidator($validatorText);
        $nomWidget->setAttributs(array("class" => "form_text"));
        $nomWidget->setLabelAttributs(array("class" => "form_label"));

        $personneGroupWidget = new PersonneGroupWidget($dataMap);
        $personneGroupWidget->setName("personneGroupWidget");
        $widgetSubmit = new WidgetSubmit();
        $widgetSubmit->setName("button");
        $widgetSubmit->setValue("button");

        $this->addWidget($widgetSubmit, 'button');
        $this->addWidget($nomWidget, 'title');
        $this->addWidget($personneGroupWidget, 'personneGroupWidget');
    }

}
