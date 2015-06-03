<?php

namespace ItechSup\Validator\Validator;

use ItechSup\Validator\Constraint\Exception\ConstraintException;
use ItechSup\Validator\Constraint\Constraint;

class Validator {

    private $listConstraint;
    private $listError;

    public function __construct() {
        $this->listConstraint = array();
        $this->listError = array();
    }

    public function addConstraint(Constraint $constraint) {
        $constraint->addValidator($this);
        $this->listConstraint[] = $constraint;
    }

    public function getConstraints() {
        return $this->listConstraint;
    }

    public function getConstraint() {
        return $this->listConstraint;
    }

    public function removeConstraint() {
        return $this->listConstraint;
    }

    public function clearConstraint() {
        $this->listConstraint = array();
    }

    public function isValid($value) {
        $isValid = true;
        foreach ($this->listConstraint as $constraint) {
            try {
                $constraint->isValid($value);
            } catch (ConstraintException $e) {
                $this->listError[] = $e->getMessage();
                $isValid = false;
            }
        }
        return $isValid;
    }

    public function getListErrors() {
        return $this->listError;
    }

}
