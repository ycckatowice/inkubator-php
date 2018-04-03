<?php

session_start();

define("BASE_POINTS", 0);

if(!isset($_SESSION["myPoints"]) || !isset($_SESSION["compPoints"])) {
    game();
}

if (!isset($compDeck) || !isset($userDeck)){
    require_once "data.php";
    $deck = json_encode($data);

    file_put_contents("deck.txt", $deck);

    $update = file_get_contents("deck.txt");
    $compDeck = json_decode($update, true);
    $userDeck = json_decode($update, true);
}

function game()
{
    $_SESSION["myPoints"] = BASE_POINTS;
    $_SESSION["compPoints"] = BASE_POINTS;
}

function removeComp($array, $index){
    if(file_exists("compDeck.txt")){
        $update = file_get_contents("compDeck.txt");
        $array = json_decode($update, true);
    }else{$update = file_get_contents("deck.txt");
        $array = json_decode($update, true);}

    if(sizeof($array) <=1){
        echo "Koniec kart. Przegrana.";
        $update = file_get_contents("deck.txt");
        $array = json_decode($update, true);
    }

    array_splice($array,$index, 1);
    //unset($array[$index]);
    var_dump($array);
    $arr = json_encode($array);
    file_put_contents("compDeck.txt", $arr);
}

function removeUser($array, $index){
    if(file_exists("userDeck.txt")){
        $update = file_get_contents("userDeck.txt");
        $array = json_decode($update, true);
    }else{$update = file_get_contents("deck.txt");
        $array = json_decode($update, true);}

    if(sizeof($array) <=1){
        echo "Koniec kart. Przegrana.";
        $update = file_get_contents("deck.txt");
        $array = json_decode($update, true);
    }

    array_splice($array,$index, 1);
    //unset($array[$index]);
    var_dump($array);
    $arr = json_encode($array);
    file_put_contents("userDeck.txt", $arr);
}

if(isset($_GET['choice']) && $_GET['choice'] === "play"){

    if(file_exists("compDeck.txt")){
        $update = file_get_contents("compDeck.txt");
        $compDeck = json_decode($update, true);
    } else{
        $update = file_get_contents("deck.txt");
        $compDeck = json_decode($update, true);
    }

    if(file_exists("userDeck.txt")){
        $update = file_get_contents("userDeck.txt");
        $userDeck = json_decode($update, true);
    }else{
        $update = file_get_contents("deck.txt");
        $userDeck = json_decode($update, true);
    }

    $compDeckSize = sizeof($compDeck);
    $i = rand(0, $compDeckSize -1);
    $computerChoice[$i] = $compDeck[$i];

    $userDeckSize = sizeof($userDeck);
    $j = rand(0, $userDeckSize -1);
    $userChoice[$j] = $userDeck[$j];

    var_dump($computerChoice[$i]['strength']);
    var_dump($userChoice[$j]['strength']);
    $computerScore = $computerChoice[$i]['strength'];
    $userScore = $userChoice[$j]['strength'];

    $compDeckSize -= 1;
    $userDeckSize -= 1;
    echo "pozostałe karty: ".$compDeckSize."<br>";
    echo "pozostałe karty: ".$userDeckSize."<br>";

    if($computerChoice[$i]['strength'] > $userChoice[$j]['strength']){

        echo "Komputer wygrywa potyczkę <br>";
        $_SESSION["compPoints"] += $computerScore + $userScore;

        removeComp($compDeck, $i);
        removeUser($userDeck, $j);

    }else if ($computerChoice === $userChoice){
        echo"Wojna!";
        removeComp($compDeck, $i);
        removeUser($userDeck, $j);
    }else{
        echo "Gracz wygrywa potyczkę <br>";
        $_SESSION["myPoints"] += $userScore + $computerScore;
        removeComp($compDeck, $i);
        removeUser($userDeck, $j);
    }


    if($_GET['choice'] === "end"){
        header("Location: index.php");
    }

}else{
    game();
    $computerChoice ="";
    $userChoice ="";
    if(file_exists("compDeck.txt") || file_exists("userDesk.txt")){
        unlink("compDeck.txt");
        unlink("userDeck.txt");
    }

}



if($_SESSION["compPoints"] >= 100){
    echo "<br><h1>Komputer wygrywa wojnę</h1>";
    game();
}
if($_SESSION["myPoints"] >= 100){
    echo "<br><h1>Gracz wygrywa wojnę</h1>";
    game();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wojna</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
    Komputer: <?php
    echo $_SESSION["compPoints"];
    var_dump($computerChoice);

    ?>
</div>

<div>
    Gracz: <?php
    echo $_SESSION["myPoints"];
    var_dump($userChoice); ?>
</div>

<div>
    <a href="?choice=play">Graj</a>
</div>
<div>
    <a href="?choice=end">Zakończ</a>
</div>

</body>


</html>