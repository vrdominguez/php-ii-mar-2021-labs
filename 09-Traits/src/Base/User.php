<?php

namespace Base;

class User {
    public function __construct(
        private string $userName,
        private string $password,
        private string $accessLevel,
    ) {}

    use \Traits\Serialization, \Traits\ToString {
        \Traits\ToString::__toString insteadof \Traits\Serialization;
    }
}