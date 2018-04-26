<?php

// Å?ukasz

function categoryInsertOne(PDO $pdo, string $name): array {
    $category = [
        'name' => $name,
    ];

    $statement =  $pdo->prepare("
        INSERT into category (name)
        VALUES(:name) 
    ");


    $statement->execute($category);

    $category['id'] = (int)$pdo->lastInsertId();

    return $category;
}
