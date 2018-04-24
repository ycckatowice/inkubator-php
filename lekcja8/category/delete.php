<?php

require_once '../autoload.php';

// getRequestGetVariable id
$id = getRequestGetVariable('id');
// if not set redirect:  /lekcja8/user/all.php?selectId
if(!$id){
    header('Location: /lekcja8/category/all.php?selectId');
}

//userFindOneById

$product = categoryFindOneById($pdo, (int) $id);
// if no user redirect: /lekcja8/user/all.php?userNotExistsId=' . $id

if(!$product){
    header('Location: /lekcja8/category/all.php?categoryNotExistsId=' . $id);
}

categoryDeleteOneById($pdo, (int) $id);
header('Location: /lekcja8/category/all.php?deletedId=' . $id);

