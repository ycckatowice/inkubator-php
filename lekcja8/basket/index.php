<?php
require_once '../partial_view/header.php';
if (!Authorization::isAuthorizedAny()) {
    header('Location: /lekcja8/login.php');
}
// TODO get list of orders
 $basket = BasketManager::getBasket();
 $orders = $basket->getOrders();
?>
<table class="table">
    <tr>
        <td><b>Product name</b></td>
        <td><b>Product cost</b></td>
    </tr>
    <?php
    
    // TODO Iterate all orders
    foreach ($orders as $order) {
        echo "
        <tr>
            <td>{$order->getProductName()}</td>
            <td>{$order->getProductCost()}</td>
       </tr>";
    }
    // TODO Buy all products
    
    ?>
</table>



<?php
require_once '../partial_view/footer.php';