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
$category_id = getRequestPostVariable('category_id');
$cost = getRequestPostVariable('cost');

// - first_name
// - last_name
// - email
// - city

if($name && $category_id && $cost){
  
    $product->setName($name);
    $updateProduct->updateOne($product);
    header('Location: /lekcja8/product/all.php?updatedId=' . $product->getId());
}

// check if all set

// > userInsertOne

// > redirect: 

// > userUpdateOneById

// redirect: /lekcja8/user/all.php?updatedId=' . $user['id']

?>


<h1>Product id: <?= $product->getId() ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
         Name:
         <input class="form-control" type="text" name="name" required value="<?= $name? $name: $product->getName() ?>">
    </div>
    <div>
        Cost:
        <input class="form-control" type="text" name="cost" required  value="<?= $cost? $cost: $product->getCost() ?>">
    </div>
    <div>
        Category id:
        <input class="form-control" type="text" name="category_id" required  value="<?= $category_id? $category_id: $product->getCategoryId() ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>
// Oskar
