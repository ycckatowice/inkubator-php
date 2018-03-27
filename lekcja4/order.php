<?php

include_once 'partial/header.php';

if(isset($_GET['order_id'])){
    $orderId = $_GET['order_id'];
}else{
     $orderId = '';
}
?>


<div class="container">
    <h1>Zamawiasz pizze</h1>
</div>
<?php
    include_once 'partial/footer.php';
?>