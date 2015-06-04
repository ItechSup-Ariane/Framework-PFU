<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintNumeric extends Constraint {

    protected $messageError = "La ne peut pas être vide";
    protected $compareTo;

    public function __construct($compareTo) {
        $this->compareTo = $compareTo;
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
