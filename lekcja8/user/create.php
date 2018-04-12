<?php
require_once '../partial_view/header.php';


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
    $user = userInsertOne($pdo, $firstName, $lastName, $email, $city);
    header('Location: /lekcja8/user/all.php?addedId=' . $user['id']);
}

// check if all set

// > userInsertOne

// > redirect: 



?>

<form class="form-group" action="create.php" method="POST">
    <div>
        First name:
        <input class="form-control" type="text" name="first_name" required>
    </div>
    <div>
        Last name:
        <input class="form-control" type="text" name="last_name" required>
    </div>
    <div>
        Email:
        <input class="form-control" type="email" name="email" required>
    </div>
    <div>
        City:
        <input class="form-control" type="city" name="city" required>
    </div>
    <div>
        <input type="submit" value="Create">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>