<?php

namespace ItechSup\Form\Exception;

use Exception;

class FormException extends Exception
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
