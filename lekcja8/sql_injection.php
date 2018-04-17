<?php
require_once 'partial_view/header.php';

$firstName = getRequestPostVariable('first_name');
$sql = "SELECT * FROM `user` WHERE first_name like '%$firstName%'";
//$sql ="SELECT * FROM category WHERE id = '1' or 1=1; insert into category (name) values ('x2'); -- ";
echo "<h1>sql example: $sql</h1>";

try {
//    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
    $stmt = $pdo->query($sql);

    $users = $stmt->fetchAll();
} catch (Exception $ex) {
    echo "<b1>" . $ex->getMessage();
}

//Find all users here
?>
<br><br><br>
<h1>User list:</h1>


<div >
    <form method="post" class="float-left form-group">
        <div class="input-group">
            <input type="text" class="form-control" name="first_name" placeholder=" Wprowadź imię...">
            <span class="input-group-btn">
                <input class="btn btn-secondary" type="submit" value="Szukaj!">
            </span>
        </div>

</form>
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
    foreach ($users as $user) {
        echo "<tr>
     <td>{$user['id']}</td>
     <td>{$user['first_name']}</td>
     <td>{$user['last_name']}</td>
     <td>{$user['email']}</td>
     <td>{$user['city']}</td>
        <td>
         <a href='view.php?id={$user['id']}'>View</a>
         <a href='update.php?id={$user['id']}'>Update</a>
         <a href='delete.php?id={$user['id']}'>Delete</a>
       </td>
       </tr>";
    }
    // Add actions to each row
    ?>
</table>

<?php
require_once 'partial_view/footer.php';

