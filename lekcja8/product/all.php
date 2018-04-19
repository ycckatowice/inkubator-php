<?php
require_once '../partial_view/header.php';

$productRepository = new ProductRepository($pdo);

$products = $productRepository->findAll();

$product = new Product();
$product->name = "Muszka czarna";
$product->category_id = 4;
$product->cost = 17.50;

$productRepository->insertOne($product);


var_dump($products);
/** @var Product $productFromBase */
$productFromBase = $products[0];

$productFromBase->name = 'Inny produkt niż przedtem';
$productRepository->updateOne($productFromBase);
$productRepository->deleteOneById($productFromBase->id);