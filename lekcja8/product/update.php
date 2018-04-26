<?php
require_once '../partial_view/header.php';
Authorization::checkPermissions();


$updateProduct= new ProductRepository($pdo);

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
       header('Location: /lekcja8/product/all.php?selectId');
}

//userFindOneById

$product = $updateProduct->findOneById( (int) $id);

// if no user redirect: /lekcja8/user/all.php?productNotExistsId=' . $id

if(!$product){
    header('Location: /lekcja8/product/all.php?productNotExistsId=' . $id);
}

// getRequestPostVariables 
$name = getRequestPostVariable('name');
$categoryId = getRequestPostVariable('category_id');
$cost = getRequestPostVariable('cost');

// - first_name
// - last_name
// - email
// - city

if($name && $categoryId && $cost){
  
    $product->setName($name);
    $product->setCost($cost);
    $product->setCategoryId($categoryId);
    $updateProduct->updateOne($product);
<?php
require_once '../partial_view/header.php';
Authorization::checkPermissions();


$updateProduct= new ProductRepository($pdo);

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
       header('Location: /lekcja8/product/all.php?selectId');
}

//userFindOneById

$product = $updateProduct->findOneById( (int) $id);

// if no user redirect: /lekcja8/user/all.php?productNotExistsId=' . $id

if(!$product){
    header('Location: /lekcja8/product/all.php?productNotExistsId=' . $id);
}

// getRequestPostVariables 
$name = getRequestPostVariable('name');
$categoryId = getRequestPostVariable('category_id');
$cost = getRequestPostVariable('cost');

// - first_name
// - last_name
// - email
// - city

if($name && $categoryId && $cost){
  
    $product->setName($name);
    $product->setCost($cost);
    $product->setCategoryId($categoryId);
    $updateProduct->updateOne($product);

=======
    

        <input class="form-control" type="text" name="category_id" required  value="<?= $categoryId? $categoryId: $product->getCategoryId() ?>">
        <input class="form-control" type="text" name="category_id" required  value="<?= $categoryId? $categoryId: $product->getCategoryId() ?>">
