<?php

try {
    // Database conection
    $pdo = new PDO(
        'mysql:host=mysql;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );
    // Prepare an SQL statement and get a statement object

    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    // Execute the SQL statement
    if ($stmt->execute([ ':firstname' => 'Sarah', ':lastname' => 'Connor' ])) {
        echo 'New user Sarah Connor added' . PHP_EOL;
    }
} 
catch (PDOException $e){
    echo "Error in PDO: " . $e->getMessage() . PHP_EOL;
}