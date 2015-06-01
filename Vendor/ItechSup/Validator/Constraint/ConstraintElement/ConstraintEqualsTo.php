<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;

class ConstraintEqualsTo extends Constraint {

    protected $messageError = "invalid";

    public function isValid($value) {
        $isValid = false;
        if (!empty($value)) {
            $isValid = true;
        } else {
            $this->validator->setError($this->messageError);
        }
    }

}
