<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintType extends Constraint {

    protected $messageError = "The field must be a number";
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function isValid($value) {
        $checker = "is_" . $this->type;
        if (function_exists($checker)) {
            if (!$checker($value)) {
                throw new ConstraintException($this->messageError);
            }
        } else {
            
        }
    }

}
