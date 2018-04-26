<?php

//TOMEK
require_once '../partial_view/header.php';
Authorization::checkPermissions();


// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/product/all.php?selectId

if(!$id){
   header('Location: /lekcja8/product/all.php?selectId');
}

//productFindOneById



$productRepository = new ProductRepository($pdo, (int) $id);
    

$product = $productRepository->findOneById((int) $id);

//$product = ($pdo, (int) $id);
// if no user redirect: /lekcja8/product/all.php?productNotExistsId=' . $id

if(!$product){
   header('Location: /lekcja8/product/all.php?productNotExistsId=' . $id);
}


?>
<h1>View product: <?= $id ?></h1>


<table class="table">
    <tr>
        <td>Id</td>
        <td><?= $product->getId() ?></td>
    </tr>
    <tr>
        <td>Product name</td>
        <td><?= $product->getName() ?></td>
    </tr>
    <tr>
        <td>Category id</td>
        <td><?= $product->getCategoryId() ?></td>
    </tr>
    <tr>
        <td>Cost</td>
        <td><?= $product->getCost() ?></td>
    </tr>
</table>



<?php
require_once '../partial_view/footer.php';