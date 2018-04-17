<?php

function categoryDeleteOneById(PDO $pdo, int $id): void{
    $statement = $pdo->prepare("DELETE from category WHERE id = :id");
    $statement->execute(['id' => $id]);
}