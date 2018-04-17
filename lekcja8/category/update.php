
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

$user = categoryFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/category/all.php?userNotExistsId=' . $id

if(!$user){
    header('Location: /lekcja8/category/all.php?categoryNotExistsId=' . $id);
}

// getRequestPostVariables 
$name = getRequestPostVariable('name');

// - first_name
// - last_name
// - email
// - city

if($name){
    $user = categoryUpdateOneById($pdo, (int) $id, $name);
    header('Location: /lekcja8/category/all.php?updatedId=' . $user['id']);
}

// check if all set

// > userInsertOne

// > redirect: 

// > userUpdateOneById

// redirect: /lekcja8/category/all.php?updatedId=' . $user['id']

?>


<h1>User id: <?= $user['id'] ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
        Category:
        <input class="form-control" type="text" name="first_name" required value="<?= $name? $name: $user['name'] ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>