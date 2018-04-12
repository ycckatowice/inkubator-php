<?php
require_once '../partial_view/header.php';


// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
    header('Location: /lekcja8/user/all.php?selectId');
}

//userFindOneById

$user = userFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/user/all.php?userNotExistsId=' . $id

if(!$user){
    header('Location: /lekcja8/user/all.php?userNotExistsId=' . $id);
}

// getRequestPostVariables 
$firstName = getRequestPostVariable('first_name');
$lastName = getRequestPostVariable('last_name');
$email = getRequestPostVariable('email');
$city = getRequestPostVariable('city');
// - first_name
// - last_name
// - email
// - city

if($firstName && $lastName && $email && $city){
    $user = userUpdateOneById($pdo, (int) $id, $firstName, $lastName, $email, $city);
    header('Location: /lekcja8/user/all.php?updatedId=' . $user['id']);
}

// check if all set

// > userInsertOne

// > redirect: 

// > userUpdateOneById

// redirect: /lekcja8/user/all.php?updatedId=' . $user['id']

?>


<h1>User id: <?= $user['id'] ?> </h1>

<form class="form-group" action="update.php?id=<?= $id ?>" method="POST">
    <div>
        First name:
        <input class="form-control" type="text" name="first_name" required value="<?= $firstName? $firstName: $user['first_name'] ?>">
    </div>
    <div>
        Last name:
        <input class="form-control" type="text" name="last_name" required  value="<?= $firstName? $firstName: $user['last_name'] ?>">
    </div>
    <div>
        Email:
        <input class="form-control" type="email" name="email" required  value="<?= $firstName? $firstName: $user['email'] ?>">
    </div>
    <div>
        City:
        <input class="form-control" type="city" name="city" required disabled value="<?= $firstName? $firstName: $user['city'] ?>">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>