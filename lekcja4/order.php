<?php

include_once 'partial/header.php';
<<<<<<< HEAD
if(isset($_GET['order_id'])){
$orderId=$_GET['order_id'];
}else{
    $orderId='';
}

=======

if(isset($_GET['order_id'])){
    $orderId = $_GET['order_id'];
}else{
    $orderId ='';
}
>>>>>>> 582cf8484a1dc4288dd5bd3f489a1a58c5f73065
?>
<div class="container">
    <h1>Zamawiasz pizze</h1>
</div>
<?php
    include_once 'partial/footer.php';
?>