<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelInterface
 *
 * @author mikolaj
 */
interface ProductInterface {

    public function __construct(string $name, int $categoryId, float $cost);

    public function setName(string $name): void;

    public function getName(): string;

    public function getId(): int;

    public function setId(int $id): void;

    public function getCategoryId(): int;

    public function getCost(): int;

    public function setCategoryId(int $categoryId): void;

    public function setCost(float $cost): void;

    public static function createFromDB(int $id, string $name, int $categoryId, float $cost): ProductInterface;
}
