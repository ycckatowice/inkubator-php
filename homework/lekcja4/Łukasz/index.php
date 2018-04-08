<?php

session_start();

define("BASE_POINTS", 0);

require_once "data.php";


if(!isset($_SESSION["myPoints"]) || !isset($_SESSION["compPoints"])) {
    setBasePoints();
}

if(empty($_SESSION['compDeck']) || empty($_SESSION['userDeck'])){
    $_SESSION['compDeck'] = $data;
    $_SESSION['userDeck'] = $data;
}

function setBasePoints() //zmienić nazwę funkcji na bardziej przyjazną :v
{
    $_SESSION["myPoints"] = BASE_POINTS;
    $_SESSION["compPoints"] = BASE_POINTS;
}

if(isset($_GET['choice']) && $_GET['choice'] === "play"){

    if(!isset($compDeckSize)) {
        $compDeckSize = sizeof($_SESSION['compDeck']) -1;
    }

    $compIndex = rand(0, $compDeckSize);
    $computerChoice[$compIndex] = $_SESSION['compDeck'][$compIndex];

    if(!isset($userDeckSize)){
        $userDeckSize = sizeof($_SESSION['userDeck']) -1;
    }
    $userIndex = rand(0, $userDeckSize);
    $userChoice[$userIndex] = $_SESSION['userDeck'][$userIndex];

    if(!isset($_SESSION['compWonDeck']) || !isset($_SESSION['userWonDeck']) || !isset($_SESSION['warDeck'])){
        $_SESSION['compWonDeck'] = [];
        $_SESSION['userWonDeck'] = [];
        $_SESSION['warDeck'] = [];
    }
    
    //    <=>
    
    $computerScore = $computerChoice[$compIndex]['strength'];
    $userScore = $userChoice[$userIndex]['strength'];

    /*compDeckSize -= 1;
    $userDeckSize -= 1;*/

    if($computerChoice[$compIndex]['strength'] > $userChoice[$userIndex]['strength']){

        $wynik = "Komputer wygrywa potyczkę <br>";
        $_SESSION["compPoints"] += $computerScore + $userScore;

        array_push($_SESSION['compWonDeck'], $computerChoice[$compIndex]);
        array_push($_SESSION['compWonDeck'], $userChoice[$userIndex]);

        //var_dump(sizeof($_SESSION['compWonDeck']));
        //var_dump(sizeof($_SESSION['userWonDeck']));

        array_splice($_SESSION['compDeck'], $compIndex, 1);
        array_splice($_SESSION['userDeck'], $userIndex, 1);

        if(!empty($_SESSION['warDeck'])){
            array_push($_SESSION['compWonDeck'], $_SESSION['warDeck']);
        }

        $compDeckSize = sizeof($_SESSION['compDeck']);
        $userDeckSize = sizeof($_SESSION['userDeck']);

       // var_dump($computerChoice[$compIndex]);

    }else if ($computerChoice === $userChoice){      //nie działa prawidłowo, jeśli każdemu zostało po 1 karcie
        $wynik ="Wojna!<br>";

        array_push($_SESSION['warDeck'], $computerChoice[$compIndex]);
        array_push($_SESSION['warDeck'], $userChoice[$userIndex]);

        echo "warDeck: ". sizeof($_SESSION['warDeck']);

        $compDeckSize = sizeof($_SESSION['compDeck']);
        $userDeckSize = sizeof($_SESSION['userDeck']);

    }else{
        $wynik = "Gracz wygrywa potyczkę <br>";

        $_SESSION["myPoints"] += $userScore + $computerScore;

        array_push($_SESSION['userWonDeck'], $computerChoice[$compIndex]);
        array_push($_SESSION['userWonDeck'], $userChoice[$userIndex]);

        //var_dump(sizeof($_SESSION['userWonDeck']));

        array_splice($_SESSION['compDeck'], $compIndex, 1);
        array_splice($_SESSION['userDeck'], $userIndex, 1);

        $compDeckSize = sizeof($_SESSION['compDeck']);
        $userDeckSize = sizeof($_SESSION['userDeck']);

        if(!empty($_SESSION['warDeck'])){
            array_push($_SESSION['userWonDeck'], $_SESSION['warDeck']);
        }

    }

    if($_GET['choice'] === "end"){
        header("Location: index.php");
    }

}else{
    setBasePoints();
    $computerChoice ="";
    $userChoice ="";
    $_SESSION['compWonDeck'] = [];
    $_SESSION['userWonDeck'] = [];
    $_SESSION['compDeck'] = [];
    $_SESSION['userDeck'] = [];
    $_SESSION['warDeck'] = [];
}

if(empty($_SESSION['compDeck'])){
    if(!empty($_SESSION['compWonDeck'])){
        $_SESSION['compDeck'] = array_merge($_SESSION['compDeck'], $_SESSION['compWonDeck']);
        $_SESSION['compWonDeck'] = [];
        //var_dump($_SESSION['compDeck']);
    }else{
        echo "<br><h1>Koniec kart! Gracz wygrywa wojnę!</h1>";
    }

}
if(empty($_SESSION['userDeck'])){
    if(!empty($_SESSION['userWonDeck'])){
        $_SESSION['userDeck'] = array_merge($_SESSION['userDeck'], $_SESSION['userWonDeck']);
        $_SESSION['userWonDeck'] = [];
        //var_dump($_SESSION['userDeck']);
    }else{
        echo "<br><h1>Koniec kart! Komputer wygrywa wojnę</h1>";
    }
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
    <?php
    if(isset($wynik)){
        echo $wynik;
        echo "Komputer:".$_SESSION["compPoints"];
        echo '<div><img class="card" src='.$computerChoice[$compIndex]["img"].'></div>';
        //echo '<div><img class="card" src='.$_SESSION['compDeck'][$compIndex]["img"].'></div>';
        echo "pozostałe karty: ".$compDeckSize."<br>";
        echo "Gracz:".$_SESSION["myPoints"];
        echo '<div><img class="card" src='.$userChoice[$userIndex]["img"].'></div>';
        //echo '<div><img class="card" src='.$_SESSION['userDeck'][$userIndex]["img"].'></div>';
        echo "pozostałe karty: ".$userDeckSize."<br>";
    }
    ;?>
</div>

<div>
    <a href="?choice=play">Graj</a>
</div>
<div>
    <a href="?choice=end">Zakończ</a>
</div>

</body>


</html>