<?php

namespace ItechSup\Validator\Constraint;

use ItechSup\Validator\Validator\Validator;

abstract class Constraint
{
    protected $messageError;
    protected $validator;
    protected $compareTo;

    abstract public function isValid($value);

    public function addValidator(Validator $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    public function getMessageError()
    {
        return $this->messageError;
    }

    public function setMessageError($messageError)
    {
        $this->messageError = $messageError;
    }

    public function getCompareTo()
    {
        return $this->compareTo;
    }

    public function setCompareTo($compareTo)
    {
        $this->compareTo = $compareTo;
    }
}
