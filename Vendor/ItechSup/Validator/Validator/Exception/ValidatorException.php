<?php

namespace ItechSup\Validator\Validator\Exception;

use \Exception;

class ValidatorException extends Exception {

    public function __construct($message) {
        parent::__construct($message);
    }

    public function __toString() {
        return $this->message;
    }

}
