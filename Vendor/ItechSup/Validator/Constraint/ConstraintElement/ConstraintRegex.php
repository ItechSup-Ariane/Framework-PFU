<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintRegex extends Constraint {

    private $regex;

    public function __construct() {
        $this->messageError = "La ne peut pas être vide";
    }

    public function isValid($value) {
        $isValide = false;
        if (empty($this->regex))
            throw new Exception\ValidatorException("Invalide Arguments");
        if (preg_match($this->regex, $value)) {
            $isValide = true;
        } else {
            throw new ConstraintException($this->messageError);
        }
    }

}
