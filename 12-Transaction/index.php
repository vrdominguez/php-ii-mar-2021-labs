<?php

try {
    // Database conection
    $pdo = new PDO(
        'mysql:host=mysql;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );

    // Begin the transaction
    $pdo->beginTransaction();

    // Prepare an SQL statement and get a statement object
    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    $clients = [
        [ ':firstname' => 'John', ':lastname' => 'Connor' ],
        [ ':firstname' => 'Terminator', ':lastname' => 'T800'   ],
        [ ':firstname' => 'Terminator', ':lastname' => 'T1000'  ],
    ];

    foreach ( $clients as $client ) {
        $stmt->execute( $client );
    }

    // Commit success
    $pdo->commit();

    echo 'Done' . PHP_EOL;
}
catch (PDOException $e ){
    $pdo->rollBack(); // Rollback in case of failure
    // log and communicate error
    echo "ERROR: " . $e->getMessage() . PHP_EOL
        ."Applied rollback!" . PHP_EOL;
}
