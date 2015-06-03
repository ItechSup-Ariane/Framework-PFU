<?php

namespace FormCustom;

use Entity\PersonneEntity;
use Entity\AdresseEntity;
use FormCustom\AdresseGroupWidget;
use ItechSup\Form\GroupWidget;
use ItechSup\Form\Widget\WidgetInteger;
use ItechSup\Form\Widget\WidgetText;
use ItechSup\Validator\Constraint\ConstraintElement\ConstraintNotNull;
use ItechSup\Validator\Constraint\ConstraintElement\ConstraintType;
use ItechSup\Validator\Validator\Validator;

class PersonneGroupWidget extends GroupWidget {

    private $nomWidget;
    private $nbEnfantWidget;
    private $adresseGroupWidget;

    public function __construct(PersonneEntity $entity) {
        $this->setDataMap($entity);
        $this->nomWidget = new WidgetText();
        $this->nomWidget->setName("nom");
        $this->nomWidget->setLabel("Nom :");
        $this->nomWidget->setAttributs(array("class" => "form_text"));
        $this->nomWidget->setLabelAttributs(array("class" => "form_label"));

        $this->nbEnfantWidget = new WidgetInteger();
        $this->nbEnfantWidget->setName("nbEnfant");
        $this->nbEnfantWidget->setLabel("Nombre d'enfant :");
        $this->nbEnfantWidget->setAttributs(array("required" => "", "class" => "form_text"));
        $this->nbEnfantWidget->setLabelAttributs(array("class" => "form_label"));

        $this->adresseGroupWidget = new AdresseGroupWidget(new AdresseEntity());
        $this->adresseGroupWidget->setName("adresse");

        $validatorText = new Validator();
        $validatorText->addConstraint(new ConstraintNotNull());

        $validatorInteger = new Validator();
        $validatorInteger->addConstraint(new ConstraintNotNull());
        $validatorInteger->addConstraint(new ConstraintType("numeric"));

        $this->nomWidget->setValidator($validatorText);
        $this->nbEnfantWidget->setValidator($validatorInteger);

        $this->addWidget($this->nomWidget, "nom")
                ->addWidget($this->nbEnfantWidget, "nbEnfant")
                ->addWidget($this->adresseGroupWidget, "adresse");
    }

}
