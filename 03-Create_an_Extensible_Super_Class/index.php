<?php

define( 'BASE', realpath(__DIR__ ) );

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);

use \Users\Admin as AdminUser;
use \Users\Client as ClientUser;

$adm = new AdminUser( 'admin', '1234');
echo "User data for admin:" . PHP_EOL . $adm . PHP_EOL;

if ( $adm->login('1234') ) {
    echo "Login success" . PHP_EOL;
}

$adm->setPassword('adminP455');
if ( ! $adm->login('1234') ) {
    echo 'Login fails correctly' . PHP_EOL;
}

$client = new ClientUser( 'client', 'My53cur3P455');
echo "User data for client:" . PHP_EOL . $client . PHP_EOL;

if ( $client->login('My53cur3P455') ) {
    echo "Login success" . PHP_EOL;
}

// Test call with setter and getter
$client->setUserName('costumer');
echo "Now the new userName of the client is " . $client->getUserName() . PHP_EOL . PHP_EOL;

// Test exceptions in call
try {
    $client->badMethod('fails');
}
catch ( \Exception $e ) {
    echo "This call fails with error: " . $e->getMessage() . PHP_EOL;
}

// Serialize objects
echo "Admin user serialized" . serialize($adm) . PHP_EOL;
echo "Client user serialized" . serialize($client) . PHP_EOL;