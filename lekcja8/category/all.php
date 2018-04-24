<?php
require_once '../partial_view/header.php';
Authorization::checkPermissions();

$categories = categoryFindAll($pdo);

//Find all users here
?>
<br><br><br>
<h1>Category list:</h1>
<div>
    <a class="btn btn-success float-right" href='create.php'>Create Category</a>
    <br><br><br><br>
</div>
<table class="table">
    <tr>
        <td>Category</td>
    </tr>
    <?php
    // Iterate all users
    foreach ($categories as $product) {
        echo "<tr>
     <td>{$product['name']}</td>
        <td>
         <a href='view.php?id={$product['id']}'>View</a>
         <a href='update.php?id={$product['id']}'>Update</a>
         <a href='delete.php?id={$product['id']}'>Delete</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once '../partial_view/footer.php';


