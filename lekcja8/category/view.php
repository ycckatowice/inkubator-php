<?php
require_once '../partial_view/header.php';

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
    header('Location: /lekcja8/category/all.php?selectId');
}

//categoryFindOneById

$category = categoryFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/user/all.php?userNotExistsId=' . $id

if(!$category){
    header('Location: /lekcja8/category/all.php?categoryNotExistsId=' . $id);
}


?>
<h1>View user: <?= $id ?></h1>


<table class="table">
    <tr>
        <td>Id</td>
        <td><?= $category['id'] ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?= $category['name'] ?></td>
    </tr>
</table>



<?php
require_once '../partial_view/footer.php';


