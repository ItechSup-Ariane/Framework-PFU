<?php

namespace ItechSup\Form\Widget\Exception;

use \Exception;

class WidgetException extends Exception
{

    private $message;

    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function __toString()
    {
        return $this->message;
    }

}
