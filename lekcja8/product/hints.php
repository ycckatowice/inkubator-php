<?php
require_once '../partial_view/header.php';
// Magda: wyświetlić wszystkie
$productRepository = new ProductRepository($pdo);
$products = $productRepository->findAll();
var_dump($products);

// Mariusz: Tworzenie nowego produktu
$product = new Product();
$product->name = "Muszka czarna";
$product->category_id = 4;
$product->cost = 17.50;

$productRepository->insertOne($product);


// Oskar: Eycja istniejącego produktu
/** @var Product $productFromBase */
$productFromBase = $products[0];

$productFromBase->name = 'Inny produkt niż przedtem';
$productRepository->updateOne($productFromBase);


//Łukasz: Kasowanie produktu
$productRepository->deleteOneById($productFromBase->id);

// Tomek: Wyświetlenie jednego produktu
$produkt = $productRepository->findOneById(15);