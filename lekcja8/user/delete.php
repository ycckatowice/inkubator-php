<?php

require_once '../autoload.php';

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

userDeleteOneById($pdo, (int) $id);
header('Location: /lekcja8/user/all.php?deletedId=' . $id);

