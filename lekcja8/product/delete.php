<?php

require_once '../autoload.php';
Authorization::checkPermissions();


// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/product/all.php?selectId
if(!$id){
    header('Location: /lekcja8/product/all.php?selectId');
}

//productFindOneById

$productRepository = new ProductRepository($pdo);

$product = $productRepository->findOneById($id);
if(!$product){
    header('Location: /lekcja8/product/all.php?productNotExistsId=' . $id);
}

$productRepository->deleteOneById($id);
header('Location: /lekcja8/product/all.php?deletedId=' . $id);

