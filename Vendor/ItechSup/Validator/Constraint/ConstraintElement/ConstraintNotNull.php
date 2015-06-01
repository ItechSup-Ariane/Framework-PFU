<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintNotNull extends Constraint {

    public function __construct() {
        $this->messageError = "The fields must not be null";
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
