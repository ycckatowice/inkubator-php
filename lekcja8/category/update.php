<?php
require_once '../partial_view/header.php';
//Tomek

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
    header('Location: /lekcja8/category/all.php?selectId');
}

//categoryFindOneById

$category = categoryFindOneById($pdo, (int) $id);
// if no category redirect: /lekcja8/category/all.php?categoryNotExistsId=' . $id

if(!$category){
    header('Location: /lekcja8/category/all.php?categoryNotExistsId=' . $id);
}

// getRequestPostVariables 
$name = getRequestPostVariable('name');

// - name


if($name){
    $category = categoryUpdateOneById($pdo, (int) $id, $name);
    
    header('Location: /lekcja8/category/all.php?updatedId=' . $product['id']);
}

// check if all set

// > categoryInsertOne

// > redirect: 

// > categoryUpdateOneById

// redirect: /lekcja8/category/all.php?updatedId=' . $user['id']

?>


<h1>category id: <?= $category['id'] ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
        Category:
        <input class="form-control" type="text" name="name" required value="<?= $name? $name: $category['name'] ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>
