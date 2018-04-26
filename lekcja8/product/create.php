<?php
require_once '../partial_view/header.php';


// getRequestPostVariables
$name = getRequestPostVariable('name');
$category_id = getRequestPostVariable('category_id');
$cost = getRequestPostVariable('cost');


if($name){
    $productRepository = new ProductRepository($pdo);
        $product = new Product($name, $category_id, $cost);
        $productRepository->insertOne($product);
                
    header('Location: /lekcja8/product/all.php?addedId=' . $product->getID());
}

?>

    <form class="form-group" action="create.php" method="POST">
        <div>
            Product name:
            <input class="form-control" type="text" name="name" required>
        </div>
        <div>
            Category ID:
            <input class="form-control" type="text" name="category_id" required>
        </div>
        <div>
            Coast:
            <input class="form-control" type="text" name="cost" required>
        </div>
            <input type="submit" value="Create">
        </div>
    </form>

<?php
require_once '../partial_view/footer.php';
?>