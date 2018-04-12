<?php
require_once '../partial_view/header.php';


// getRequestGetVariable id

// if not set redirect:  /lekcja8/user/all.php?selectId


//userFindOneById

// if no user redirect: /lekcja8/user/all.php?userNotExistsId=' . $id

// getRequestPostVariables 

// - first_name
// - last_name
// - email
// - city

// check if all set

// > userUpdateOneById

// redirect: /lekcja8/user/all.php?updatedId=' . $user['id']

?>


<h1>User id: (Skrócony tag echo) </h1>

<form class="form-group" action="update.php?id=WPROWADZ_ID" method="POST">
    <div>
        First name:
        <input class="form-control" type="text" name="first_name" value="">
    </div>
    <div>
        Last name:
        <input class="form-control" type="text" name="last_name"  value="">
    </div>
    <div>
        Email:
        <input class="form-control" type="email" name="email"  value="">
    </div>
    <div>
        City:
        <input class="form-control" type="city" name="city"  value="">
    </div>
    <div>
        <input type="submit" value="Update">
    </div>
</form>

<?php
require_once '../partial_view/footer.php';
?>