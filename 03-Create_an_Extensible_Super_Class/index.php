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
use \Exceptions\CustomException;

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
catch ( \BadFunctionCallException $e ) {
    echo "This call fails with error: " . $e->getMessage() . PHP_EOL;
}
catch ( \Exception $e ) {
    echo "Unespected error: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

// Serialize objects
echo "Admin user serialized" . serialize($adm) . PHP_EOL
    ."Client user serialized" . serialize($client) . PHP_EOL . PHP_EOL;


// Test custom exception
try {
    throw new \Exceptions\CustomException('This is a test', 1, true);
}
catch (\Exceptions\CustomException $e ) {
    if ( $e->isATest() ) {
        echo "Testing exeption with message: " . $e->getMessage() . PHP_EOL;
    }
    else {
        echo "Expected error without test mode: " . $e->getMessage() . PHP_EOL;
    }
}
finally {
    echo "Try - catch - finally test completed!" . PHP_EOL;
}