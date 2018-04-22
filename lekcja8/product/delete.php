<?php

require_once '../autoload.php';

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/product/all.php?selectId
if(!$id){
    header('Location: /lekcja8/product/all.php?selectId');
}

//productFindOneById

$product = productFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/product/all.php?productNotExistsId=' . $id

if(!$product){
    header('Location: /lekcja8/product/all.php?productNotExistsId=' . $id);
}

productDeleteOneById($pdo, (int) $id);
header('Location: /lekcja8/product/all.php?deletedId=' . $id);

