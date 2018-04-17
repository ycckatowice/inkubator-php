
//Tomek

<?php
require_once '../partial_view/header.php';


// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
    header('Location: /lekcja8/category/all.php?selectId');
}

//userFindOneById

$category = categoryFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/category/all.php?userNotExistsId=' . $id

if(!$category){
    header('Location: /lekcja8/category/all.php?categoryNotExistsId=' . $id);
}

// getRequestPostVariables 
$name = getRequestPostVariable('name');

// - first_name
// - last_name
// - email
// - city

if($name){
    $category = categoryUpdateOneById($pdo, (int) $id, $name);
    header('Location: /lekcja8/category/all.php?updatedId=' . $category['id']);
}

// check if all set

// > userInsertOne

// > redirect: 

// > userUpdateOneById

// redirect: /lekcja8/category/all.php?updatedId=' . $user['id']

?>


<h1>category id: <?= $category['id'] ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
        Category:
        <input class="form-control" type="text" name="first_name" required value="<?= $name? $name: $category['name'] ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>