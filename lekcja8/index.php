<?php
require_once __DIR__ . '/partial_view/header.php';
if (!Authorization::isAuthorizedAny()) {
    header('Location: /lekcja8/login.php');
}
$productRepository = new ProductRepository($pdo);

$products = $productRepository->findAll();

//Find all users here
?>
<br><br><br>
<h1>Category list:</h1>
<table class="table">
    <tr>
        <td>Product name</td>
        <td>Product cost</td>
    </tr>
    <?php
    // Iterate all users

    foreach ($products as $product) {
     /**
     * @var Product Description
     */
        echo "<tr>
     <td>{$product->getName()}</td>
     <td>{$product->getCost()}</td>
        <td>
         <a href='order.php?id={$product->getId()}'>Order</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once __DIR__ . '/partial_view/footer.php';


