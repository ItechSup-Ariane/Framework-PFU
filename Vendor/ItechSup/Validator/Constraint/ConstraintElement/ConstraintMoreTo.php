<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintNumeric extends Constraint {

    public function __construct() {
        $this->messageError = "La ne peut pas être vide";
    }

    public function isValid($value) {
        $isValid = false;
        if (!empty($value)) {
            $isValid = true;
        } else {
            throw new ConstraintException($this->messageError);
        }
    }

}
