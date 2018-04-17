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
        <td>Elektronika</td>
        <td><?= $category['Elektronika'] ?></td>
    </tr>
    <tr>
        <td>Moda</td>
        <td><?= $category['Moda'] ?></td>
    </tr>
    <tr>
        <td>Dom i Ogród</td>
        <td><?= $category['Dom i ogród'] ?></td>
    </tr>
    <tr>
        <td>Supermarket</td>
        <td><?= $category['Supermarket'] ?></td>
    </tr>
    <tr>
        <td>Dziecko</td>
        <td><?= $category['Dziecko']?></td>
    </tr>
    <tr>
        <td>Uroda i zdrowie</td>
        <td><?= $category['Uroda i zdrowie']?></td>
    </tr>
    <tr>
        <td>Kultura i rozrywka</td>
        <td><?= $category['Kultura i rozrywka']?></td>
    </tr>
    <tr>
        <td>Sport i wypoczynek</td>
        <td><?= $category['Sport i wypoczynek']?></td>
    </tr>
    <tr>
        <td>Motoryzacja</td>
        <td><?= $category['Motoryzacja']?></td>
    </tr>
</table>



<?php
require_once '../partial_view/footer.php';


