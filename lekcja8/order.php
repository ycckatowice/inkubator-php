<?php

require_once __DIR__ . '/partial_view/header.php';




$basket = BasketManager::getBasket();

$productId = getRequestGetVariable("productId");

if(!$productId){
    exit("ProductId not defined");
}

$productRepository = new ProductRepository($pdo);
$product = $productRepository->findOneById((int) $productId);

if(!$product){
    exit("Product not exists");
}
    
$basket->addProduct($product);

BasketManager::saveBasket($basket);

header("Location: /lekcja8/index.php");
    