<?php

// function createDBConnection 
// - host
// - dbName
// - username
// password
// return PDO
// > $options
//        
//        
//        
// Connection string
// mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password, $options
// execute function
//sqlLite
// postgreSql
// MySQl
// Oracle Sql



function createDBConnection(string $host, string $dbName, string $username, string $password): PDO {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password, $options);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    
    return $pdo;
}

$pdo = createDBConnection("localhost", "ycckatowice_shop", "root", "");


