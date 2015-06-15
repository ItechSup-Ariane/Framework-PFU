<?php

namespace FormCustom;

use Entity\AdresseEntity;
use ItechSup\Form\GroupWidget;
use ItechSup\Form\Widget\WidgetText;
use ItechSup\Validator\Constraint\ConstraintElement\ConstraintNotNull;
use ItechSup\Validator\Validator\Validator;

class AdresseGroupWidget extends GroupWidget
{

    private $adresseWidget;
    private $codePostalWidget;
    private $villeWidget;

    public function __construct(AdresseEntity $entity)
    {
        $this->setDataMap($entity);

        $this->adresseWidget = new WidgetText();
        $this->adresseWidget->setName("adresse");
        $this->adresseWidget->setLabel("Adresse :");
        $this->adresseWidget->setAttributs(array("class" => "form_text"));
        $this->adresseWidget->setLabelAttributs(array("class" => "form_label"));

        $this->codePostalWidget = new WidgetText();
        $this->codePostalWidget->setName("codePostal");
        $this->codePostalWidget->setLabel("Code postale :");
        $this->codePostalWidget->setAttributs(array("class" => "form_text"));
        $this->codePostalWidget->setLabelAttributs(array("class" => "form_label"));

        $this->villeWidget = new WidgetText();
        $this->villeWidget->setName("ville");
        $this->villeWidget->setLabel("Ville :");
        $this->villeWidget->setAttributs(array("class" => "form_text"));
        $this->villeWidget->setLabelAttributs(array("class" => "form_label"));

        $validatorAdesse = new Validator();
        $validatorAdesse->addConstraint(new ConstraintNotNull());

        $validatorCp = new Validator();
        $validatorCp->addConstraint(new ConstraintNotNull());

        $validatorVille = new Validator();
        $validatorVille->addConstraint(new ConstraintNotNull());

        $this->adresseWidget->setValidator($validatorAdesse);
        $this->codePostalWidget->setValidator($validatorCp);
        $this->villeWidget->setValidator($validatorVille);


        $this->addWidget($this->adresseWidget, "adresse")
                ->addWidget($this->codePostalWidget, "codePostal")
                ->addWidget($this->villeWidget, "ville");
    }

}
