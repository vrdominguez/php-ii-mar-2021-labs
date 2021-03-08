<?php

namespace Base;

class User {
    public function __construct(
        private string $userName,
        private string $password,
        private string $accessLevel,
    ) {}

    use \Traits\SerializationTrait, \Traits\ToStringTrait {
        \Traits\ToStringTrait::__toString insteadof \Traits\SerializationTrait;
        \Traits\SerializationTrait::__toString as oldToString;
    }
}