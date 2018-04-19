<?php

// function userFindOneById PDO $pdo int $id : array


function userFindOneByEmail(PDO $pdo, string $email): array {
    $statement = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $statement->execute(['email' => $email]);

    $user = $statement->fetch();
    return $user ? $user : [];
}
