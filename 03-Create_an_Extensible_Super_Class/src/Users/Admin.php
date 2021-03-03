<?php

namespace Users;

class Admin extends \Base\User {
    public const ENCRYPTION = PASSWORD_BCRYPT;

    protected string $level = 'admin';

    public function setPassword( string $password ) :void {
        $this->password = password_hash($password, $this::ENCRYPTION);
    }
}