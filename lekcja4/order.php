<?php

include_once 'partial/header.php';



function requestGetVariable(string $name, string $default = ''): string
{
    if(isset($_GET[$name])){
        $variable = $_GET[$name];
    }else{
        $variable = $default;
    }
    
    return $variable;
}

$orderId = requestGetVariable("order_id");


file_put_contents("lokalna_baza.txt",  json_encode($dane));

$bazaLokalna = json_decode(file_get_contents("lokalna_baza.txt"), true);
$bazaLokalna[] = [
    "id" => 1, 
    "name" => "fsdfsd",
    
];
var_dump($bazaLokalna);

if(isset($_GET['wstecz'])){
    header('Location: index.php');
}



?>


<div class="container">
    <h1>Zamawiasz pizze</h1>
</div>
<?php
    include_once 'partial/footer.php';
?>

<?php

