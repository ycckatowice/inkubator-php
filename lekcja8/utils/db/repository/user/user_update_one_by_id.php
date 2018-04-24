<?php

//function userUpdateOneById PDO $pdo int $id string $firstName string $lastName string $email string $city: array <user>


function userUpdateOneById(PDO $pdo, int $id, string $firstName, string $lastName, string $email, string $city): array {

    $user = [
        'id' => $id,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'city' => $city
    ];
    
    $statement = $pdo->prepare("
        UPDATE user set
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            city = :city
        WHERE id = :id
    ");

    $statement->execute($user);
    return $user;
}
