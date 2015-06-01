<?php

namespace FormCustom;

use Entity\PersonneEntity;
use ItechSup\Form\GroupWidget;
use ItechSup\Form\Widget\WidgetInteger;
use ItechSup\Form\Widget\WidgetText;
use ItechSup\Validator\Constraint\ConstraintElement\ConstraintNotNull;
use \ItechSup\Validator\Constraint\ConstraintElement\ConstraintType;
use ItechSup\Validator\Validator\Validator;

class PersonneGroupWidget extends GroupWidget {

    private $nomWidget;
    private $nbEnfantWidget;

    public function __construct(PersonneEntity $entity) {
        $this->setDataMap($entity);
        $this->nomWidget = new WidgetText();
        $this->nomWidget->setName("nom");
        $this->nomWidget->setLabel("Nom :");
        $validatorText = new Validator();
        $validatorText->addConstraint(new ConstraintNotNull());
        $this->nomWidget->setValidator($validatorText);
        $this->nomWidget->setAttributs(array("class" => "form_text"));
        $this->nomWidget->setLabelAttributs(array("class" => "form_label"));

        $this->nbEnfantWidget = new WidgetInteger();
        $this->nbEnfantWidget->setName("nbEnfant");
        $this->nbEnfantWidget->setLabel("Nombre d'enfant :");
        $this->nbEnfantWidget->setAttributs(array("required" => "", "class" => "form_text"));
        $this->nbEnfantWidget->setLabelAttributs(array("class" => "form_label"));
        $validatorInteger = new Validator();
        $validatorInteger->addConstraint(new ConstraintNotNull());
        $validatorInteger->addConstraint(new ConstraintType("numeric"));
        $this->nbEnfantWidget->setValidator($validatorInteger);

        $this->addWidget($this->nomWidget, "nom")
                ->addWidget($this->nbEnfantWidget, "nbEnfant");
    }

}
