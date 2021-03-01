<?php

define( 'BASE', realpath(__DIR__ . '/src') );

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/' . $file;
    }
);

use Lab\User;

// Create user
$user = new User('login', 'p4$$W0rD.');
printUserData($user);

//Add email
$user->setEmail('user@example.com');
printUserData($user);

//Add phone number
$user->setPhoneNumber('+34.123456789');
printUserData($user);

// Test login
foreach ( ['', 'Wr0nGP4$$', 'p4$$W0rD.'] as $passwd ) {
    echo 'Login with password "' . $passwd . '"' . PHP_EOL;
    $loginStatus = $user->login($passwd) ? 'OK' : 'KO';
    echo '  - Login status: ' . $loginStatus . PHP_EOL . PHP_EOL;
}

// Available methods
echo 'Lab\User\'s available methods: ' . PHP_EOL
    . var_export(get_class_methods($user), true) . PHP_EOL;


// --------------------------------------------------------------------
function printUserData( User $userToPrint ) {
    echo "Current user data: " . PHP_EOL;

    foreach ( $userToPrint->getUserData() as $key => $value ) {
        echo "  - $key: $value" . PHP_EOL;
    }

    // Empty line
    echo PHP_EOL;
}