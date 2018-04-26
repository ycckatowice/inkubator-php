<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductRepositoryInterface
 *
 * @author mikolaj
 */
interface UserRepositoryInterface {
    //put your code here
    public function __construct(PDO $pdo);

    public function findAll(): array;

    public function deleteOneById(int $id): void;

    public function insertOne(UserInterface $product): UserInterface;

    public function updateOne(UserInterface $product): UserInterface;

    public function findOneById(int $id): ?UserInterface;
    
    public function findOneByEmail(string $email): ?UserInterface;
}
