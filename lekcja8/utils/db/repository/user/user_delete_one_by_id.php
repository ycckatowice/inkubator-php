<?php

// function userDeleteOneById PDO $pdo int $id : void


function userDeleteOneById(PDO $pdo, int $id): void{
    $statement = $pdo->prepare("DELETE from user WHERE id = :id");
    $statement->execute(['id' => $id]);
}