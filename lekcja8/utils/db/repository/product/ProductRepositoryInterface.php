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
interface ProductRepositoryInterface {

    //put your code here
    public function __construct(PDO $pdo);

    public function findAll(): array;

    public function deleteOneById(int $id): void;

    public function insertOne(ProductInterface $product): ProductInterface;

    public function updateOne(ProductInterface $product): ProductInterface;

    public function findOneById(int $id): ?ProductInterface;
}
