<?php
require_once '../partial_view/header.php';


//Find all users here
?>
<br><br><br>
<h1>User list:</h1>
<div>
    <a class="btn btn-success float-right" href='create.php'>Create user</a>
    <br><br><br><br>
</div>
<table class="table">
    <tr>
        <td>Id</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Email</td>
        <td>City</td>
        <td>Action</td>
    </tr>
    <?php
    // Iterate all users
    // 
    // Add actions to each row
    // <a href='view.php?id={$user['id']}'>View</a>
    // <a href='update.php?id={$user['id']}'>Update</a>
    // <a href='delete.php?id={$user['id']}'>Delete</a>
    ?>
</table>

<?php
require_once '../partial_view/footer.php';

