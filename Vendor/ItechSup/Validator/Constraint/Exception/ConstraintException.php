<?php

namespace ItechSup\Validator\Constraint\Exception;

use \Exception;

class ConstraintException extends Exception
{

    protected $message;

    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function __toString()
    {
        return $this->message;
    }

}
