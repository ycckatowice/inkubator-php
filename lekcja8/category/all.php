<?php
require_once '../partial_view/header.php';

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
    foreach ($categories as $category) {
        echo "<tr>
     <td>{$category['name']}</td>
        <td>
         <a href='view.php?id={$category['name']}'>View</a>
         <a href='update.php?id={$category['name']}'>Update</a>
         <a href='delete.php?id={$category['name']}'>Delete</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once '../partial_view/footer.php';


