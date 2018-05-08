<?php
require_once '../partial_view/header.php';
Authorization::checkPermissions();

$categories = categoryFindAll($pdo);

//Find all users here
?>




<?php
require_once '../partial_view/footer.php';