<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintType extends Constraint {

    private $type;

    public function __construct($type) {
        $this->type = $type;
        $this->messageError = "The field must be a number";
    }

    public function isValid($value) {
        $checker = "is_" . $this->type;
        if (!$checker($value)) {
            throw new ConstraintException($this->messageError);
        }
    }

}
