<?php

// function userInsertOne PDO $pdo string $firstName string $lastName string $email string $city: array <user>

function userInsertOne(PDO $pdo, string $firstName, $lastName, $email, $city): array {
    $user = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'city' => $city
    ];

    $statement =  $pdo->prepare("
        INSERT into user (first_name, last_name, email, city)
        VALUES(:first_name, :last_name, :email, :city) 
    ");
    
    
    $statement->execute($user);
    
    $user['id'] = (int)$pdo->lastInsertId();
            
    return $user;
}
