<?php

try {
    // Database conection
    $pdo = new PDO(
        'mysql:host=mysql;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );

    // Drop procedure (if exists)
    $pdo->exec('DROP PROCEDURE IF EXISTS phpcourse.getByLastName');

    // Create procedure
    $pdo->exec(
        'CREATE PROCEDURE phpcourse.getByLastName( p_lastname varchar(50) ) ' . 
        'BEGIN ' .
            'SELECT firstname, lastname FROM customers WHERE lastname = p_lastname; ' .
        'END'
    );


    // Prepare call to procedure
    $stmt = $pdo->prepare( 'CALL getByLastName(?)' );

    // Call procedure
    $stmt->execute(['Connor']);

    // Show Rows
    echo "Found " . $stmt->rowCount() . " Connor's" . PHP_EOL;
} 
catch (PDOException $e){
    echo "Error in PDO: " . $e->getMessage() . PHP_EOL;
}