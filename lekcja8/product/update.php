<?php
require_once '../partial_view/header.php';

//TOMEK

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/product/all.php?selectId
if(!$id){
    header('Location: /lekcja8/product/all.php?selectId');
}

//productFindOneById

$product = productFindOneById($pdo, (int) $id);
// if no product redirect: /lekcja8/product/all.php?productNotExistsId=' . $id

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


if($name && $category_id && $cost){
    $product = productUpdateOneById($pdo, (int) $id, $name, $category_id, $cost);
    header('Location: /lekcja8/product/all.php?updatedId=' . $product['id']);
}

// check if all set

// > userInsertOne

// > redirect: 

// > userUpdateOneById

// redirect: /lekcja8/user/all.php?updatedId=' . $user['id']

?>


<h1>Product id: <?= $product['id'] ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
        Name:
        <input class="form-control" type="text" name="name" required value="<?= $name? $name: $product['name'] ?>">
    </div>
    <div>
        cateory id:
        <input class="form-control" type="text" name="category_id" required  value="<?= $firstName? $firstName: $product['category_id'] ?>">
    </div>
    <div>
        Cost:
        <input class="form-control" type="text" name="cost" required  value="<?= $firstName? $firstName: $product['cost'] ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>
