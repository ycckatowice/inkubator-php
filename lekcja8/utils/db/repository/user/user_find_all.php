<?php

// function userFindAll PDO $pdo : array


function userFindAll(PDO $pdo): array{
    $statement = $pdo->prepare("SELECT * from user");

    $statement->execute();
    $users = $statement->fetchAll();
    
    return $users;
}