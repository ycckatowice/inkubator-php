<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// TOMEK


//function categoryUpdateOneById PDO $pdo int $id string $name: array <category>


function categoryUpdateOneById(PDO $pdo, int $id, string $name): array {

    $category = [
        'id' => $id,
        'name' => $name,
    ];
    
    $statement = $pdo->prepare("
        UPDATE category set
            name = :name
        WHERE id = :id
    ");

    $statement->execute($category);
    return $category;
}
