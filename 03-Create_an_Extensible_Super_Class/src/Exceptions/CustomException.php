<?php

namespace Exceptions;

class CustomException extends \Exception {
    protected bool $test = false;

    public function __construct( string $message, int $code, bool $test ) {
        parent::__construct($message, $code);
        $this->test = $test;
    }

    public function isATest(): bool {
        return $this->test;
    }
}