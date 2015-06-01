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

    public function __construct(PersonneEntity $entity) {
        $this->setDataMap($entity);
        $widgetText = new WidgetText();
        $widgetText->setName("nom");
        $validatorText = new Validator();
        $validatorText->addConstraint(new ConstraintNotNull());
        $widgetText->setValidator($validatorText);
//        $widgetText->setAttributs(array("required" => ""));

        $widgetInteger = new WidgetInteger();
        $widgetInteger->setName("nbEnfant");
        $validatorInteger = new Validator();
        $validatorInteger->addConstraint(new ConstraintNotNull());
        $validatorInteger->addConstraint(new ConstraintType("numeric"));
        $widgetInteger->setValidator($validatorInteger);

        $this->addWidget($widgetText, "nom")
                ->addWidget($widgetInteger, "nbEnfant");
    }

}
