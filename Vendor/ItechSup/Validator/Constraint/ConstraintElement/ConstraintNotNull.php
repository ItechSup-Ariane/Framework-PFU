<?php

namespace ItechSup\Validator\Constraint\ConstraintElement;

use ItechSup\Validator\Constraint\Constraint;
use ItechSup\Validator\Constraint\Exception\ConstraintException;

class ConstraintNotNull extends Constraint
{

    protected $messageError = "The fields must not be null";

    public function __construct()
    {
        
    }

    public function isValid($value)
    {
        $isValid = false;
        if (!empty($value)) {
            $isValid = true;
        } else {
            throw new ConstraintException($this->messageError);
        }
    }

}
