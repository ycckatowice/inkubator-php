<?php
require_once '../partial_view/header.php';


// getRequestPostVariables
$name = getRequestPostVariable('name');


if($name){
    $product = categoryInsertOne($pdo, $name);
    header('Location: /lekcja8/category/all.php?addedId=' . $product['id']);
}

?>

    <form class="form-group" action="create.php" method="POST">
        <div>
            Category name:
            <input class="form-control" type="text" name="name" required>
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>

<?php
require_once '../partial_view/footer.php';
?>