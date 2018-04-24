<?php
require_once __DIR__ . '/partial_view/header.php';

$productRepository = new ProductRepository($pdo);

$products = $productRepository->findAll();

//Find all users here
?>
<br><br><br>
<h1>Category list:</h1>
<div>
    <a class="btn btn-success float-right" href='create.php'>Products</a>
    <br><br><br><br>
</div>
<table class="table">
    <tr>
        <td>Product name</td>
        <td>Product cost</td>
    </tr>
    <?php
    // Iterate all users
    foreach ($products as $product) {
        echo "<tr>
     <td>{$product['name']}</td>
     <td>{$product['cost']}</td>
        <td>
         <a href='order.php?id={$product['id']}'>Order</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once __DIR__ . '/partial_view/footer.php';


