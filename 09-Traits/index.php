<?php

define( 'BASE', realpath(__DIR__ ) );

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);

use \Base\User;

$user = new User ('admin', '123456', 'publisher');

echo "Serialiced user: " . serialize($user) . PHP_EOL . PHP_EOL;

echo "Using user as string will hide the values of: " . var_export($user->getHiddenValues, true) . PHP_EOL;
echo "Testing string of user: " . PHP_EOL . $user . PHP_EOL . PHP_EOL;