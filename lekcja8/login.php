<?php
require_once __DIR__ . '/partial_view/header.php';

$invalid = getRequestGetVariable('invalid');
$login = getRequestPostVariable('login');
$password = getRequestPostVariable('password');


// Instrukcja do zaszyfrowania hasła metodą BCRYPT
// w Bazie trzymamy zaszyfrowane hasła
echo password_hash('admin1234', PASSWORD_BCRYPT);
if ($login && $password) {
   
    $user = userFindOneByEmail($pdo, $login);
 
    // password_verify
    // Instrukcja sprawdzi czy ciąg znaków przekazany w formularzu 
    // jako hasło jest zgodny z zaszyfrowanym hasłem w bazie
    
    if ($user && password_verify($password, $user['password'])) {
        // Zdeniniowaliśmy sobie class który się nazywa Authorization
        // class authorization ma metodę statyczną(static) do której odnosimy się poprzez podójny dwukropek (::)
        // metoda jest to funkcja która jest dostępna tylko w class
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


<div>
    <div class="alert-success">
        <br><b>Customer</b>
        <br><b>Login: </b> mikolaj@inkubator.com
        <br><b>Pass:</b> asdf1234
        <br><b>Admin</b>
        <br><b>Login: </b> oskar@inkubator.com
        <br><b>Pass:</b> 12346
        
    </div>
</div>
