<?php
require_once '../partial_view/header.php';


// getRequestPostVariables 

// - first_name
// - last_name
// - email
// - city


// check if all set

// > userInsertOne

// > redirect: /lekcja8/user/all.php?addedId=' . $user['id']

?>

<form class="form-group" action="create.php" method="POST">
    <div>
        First name:
        <input class="form-control" type="text" name="first_name">
    </div>
    <div>
        Last name:
        <input class="form-control" type="text" name="last_name">
    </div>
    <div>
        Email:
        <input class="form-control" type="email" name="email">
    </div>
    <div>
        City:
        <input class="form-control" type="city" name="city">
    </div>
    <div>
        <input type="submit" value="Create">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>