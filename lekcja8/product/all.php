<?php
require_once '../partial_view/header.php';
Authorization::checkPermissions();

$productRepository = new ProductRepository($pdo);
$products = $productRepository->findAll();
//Find all users here
?>
<br><br><br>
<h1>Product list:</h1>
<div>
    <a class="btn btn-success float-right" href='create.php'>Create Product</a>
    <br><br><br><br>
</div>
<table class="table">
    <tr>
        <td>Product</td>
    </tr>
    <?php
    // Iterate all users
    foreach ($products as $product) {
        echo "<tr>
     <td>{$product->getName()}</td>
        <td>
         <a href='view.php?id={$product->getId()}'>View</a>
         <a href='update.php?id={$product->getId()}'>Update</a>
         <a href='delete.php?id={$product->getId()}'>Delete</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once '../partial_view/footer.php';
