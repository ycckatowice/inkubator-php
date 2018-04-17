<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// MARIUSZ

// function categoryFindAll PDO $pdo : array


function categoryFindAll(PDO $pdo): array{
    $statement = $pdo->prepare("SELECT * from category");

    $statement->execute();
    $categories = $statement->fetchAll();
    
    return $categories;
}