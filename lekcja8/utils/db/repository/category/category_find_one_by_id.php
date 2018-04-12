<?php

function categoryFindOneById(PDO $pdo, int $id): array {
    $statement = $pdo->prepare("SELECT * FROM category WHERE id = :id");
    $statement->execute(['id' => $id]);

    $category = $statement->fetch();
    return $category ? $category : [];
}

// OSKAR