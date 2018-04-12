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


?>
<h1>View user: <?= $id ?></h1>


<table class="table">
    <tr>
        <td>Id</td>
        <td><?= $user['id'] ?></td>
    </tr>
    <tr>
        <td>First name</td>
        <td><?= $user['first_name'] ?></td>
    </tr>
    <tr>
        <td>Last name</td>
        <td><?= $user['last_name'] ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?= $user['email'] ?></td>
    </tr>
    <tr>
        <td>City</td>
        <td><?= $user['city'] ?></td>
    </tr>
</table>



<?php
require_once '../partial_view/footer.php';
