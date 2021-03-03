<?php

namespace Users;

class Client extends \Base\User {
    public const ENCRYPTION = PASSWORD_BCRYPT;

    protected string $level = 'costumer';

    public function setPassword( string $password ) :void {
        $this->password = password_hash($password,  PASSWORD_DEFAULT);
    }
}