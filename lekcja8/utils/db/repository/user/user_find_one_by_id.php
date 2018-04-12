<?php

// function userFindOneById PDO $pdo int $id : array


function userFindOneById(PDO $pdo, int $id): array {
    $statement = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $statement->execute(['id' => $id]);

    $user = $statement->fetch();
    return $user ? $user : [];
}
