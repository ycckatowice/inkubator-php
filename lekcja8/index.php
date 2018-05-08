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
<h1>Products:</h1>
<table class="table">
    <tr>
        <td><b>Product name</b></td>
        <td><b>Product cost</b></td>
        <td><b>Action<b/></td>
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


