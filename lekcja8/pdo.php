<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_startup_errors  ", 1);


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserModel{}

    $host = '127.0.0.1';
    $dbName = 'ycckatowice_shop';
    $username = 'ycckatowice';
    $password = '';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => true,
    ];

    try {

        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password, $options);

    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

   
    
    $statement = $pdo->prepare("
        select * from `user` where id = :id;
        select * from `product` where id = i:id;
    ");
    
    $statement->execute(["id" => 1]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "UserModel");
    
    $userModel = new UserModel();
    $userModel->cokolwiek = "Ciekawe";
    $userModel->getCokolwiek();
    
    var_dump($userModel);
    
    $resluts2 =  $statement->fetchAll();
    
    var_dump($results);
    var_dump($resluts2);
//    $pdo->prepare($statement)