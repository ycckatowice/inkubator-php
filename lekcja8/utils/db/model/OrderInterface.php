<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderInterface
 *
 * @author mikolaj
 */
interface OrderInterface {

    public function __construct(UserInterface $user, ProductInterface $product);

    public static function createFromDB(
    int $orderId
    , int $productId
    , string $productName
    , int $productCategoryId
    , float $productCost
    , int $userId
    , string $userFirstName
    , string $userLastName
    , string $userCity
    );

    public function getOrderId(): int;

    public function getProductId(): int;

    public function getProductName(): string;

    public function getProductCategoryId(): int;

    public function getProductCost(): float;

    public function getUserId(): int;

    public function getUserFirstName(): string;

    public function getUserLastName(): string;

    public function getUserCity(): string;
}
