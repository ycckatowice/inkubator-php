<?php
require_once __DIR__ . '/partial_view/header.php';

$invalid = getRequestGetVariable('invalid');
$login = getRequestPostVariable('login');
$password = getRequestPostVariable('password');

echo password_hash('admin1234', PASSWORD_BCRYPT);
if ($login && $password) {
   
    $user = userFindOneByEmail($pdo, $login);
 
    if ($user && password_verify($password, $user['password'])) {
        Authorization::authorize($user);
        header('Location: /lekcja8/index.php');
    } else {
  
        header('Location: /lekcja8/login.php?invalid=true');
    }
}
?>

<form class="form-group" method="post">
    Login: <input  class="form-control" type="text" name="login"> 
    Password: <input class="form-control" type="password" name="password"> 
    <br><?= $invalid ? "<p class='alert alert-danger'>Invalid login or password</p>" : "" ?>
    <input class="btn btn-block btn-success" type="submit" value="Login!"> 

</form>



