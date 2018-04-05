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
    //var_dump($array);
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
    //var_dump($array);
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

    if(!isset($compDeckSize)) {
        $compDeckSize = sizeof($compDeck);
    }
        $i = rand(0, $compDeckSize - 1);
        $computerChoice[$i] = $compDeck[$i];

    if(!isset($userDeckSize)){
        $userDeckSize = sizeof($userDeck);
    }
    $j = rand(0, $userDeckSize -1);
    $userChoice[$j] = $userDeck[$j];

    /*echo "Przed walką";
    echo $compDeckSize;
    echo $userDeckSize;

    var_dump($computerChoice[$i]['strength']);
    var_dump($userChoice[$j]['strength']);*/
    $computerScore = $computerChoice[$i]['strength'];
    $userScore = $userChoice[$j]['strength'];

    $compDeckSize -= 1;
    $userDeckSize -= 1;

    if($computerChoice[$i]['strength'] > $userChoice[$j]['strength']){

        $wynik = "Komputer wygrywa potyczkę <br>";
        //echo $compDeckSize;
        //echo $userDeckSize;
        $_SESSION["compPoints"] += $computerScore + $userScore;

        if(!isset($compWon)){
            $compWon = [];
        }

        array_push($compWon, $computerChoice[$i]);
        array_push($compWon, $userChoice[$j]);
        removeComp($compDeck, $i);
        removeUser($userDeck, $j);

        $arr = json_encode($compDeck);
        file_put_contents("compDeck.txt", $arr);

        $compDeckSize = sizeof($compDeck);
        $userDeckSize = sizeof($userDeck);


       /*echo "Po walce";
        echo $compDeckSize;
        echo $userDeckSize;

        var_dump($compDeck);
        var_dump($userDeck);
        var_dump($compWon);*/

        //removeComp($compDeck, $i);



    }else if ($computerChoice === $userChoice){
        $wynik ="Wojna!<br>";
        //echo $compDeckSize;
        //echo $userDeckSize;
        //removeComp($compDeck, $i);
        //removeUser($userDeck, $j);

        $i = rand(0, $compDeckSize -1);
        $computerChoice[$i] = $compDeck[$i];

        $j = rand(0, $userDeckSize -1);
        $userChoice[$j] = $userDeck[$j];
        if($computerChoice[$i]['strength'] > $userChoice[$j]['strength']){
            array_push($compDeck[$i], $userDeck[$j]);
            removeUser($userDeck, $j);

        }else if($computerChoice[$i]['strength'] < $userChoice[$j]['strength']){
            array_push($userDeck[$j], $compDeck[$i]);
            removeComp($compDeck, $i);

        }

        //echo $compDeck[$i]['name'];
        //echo $compDeck[$i]['name'];
        $compDeckSize = sizeof($compDeck);
        $userDeckSize = sizeof($userDeck);
        //var_dump($compDeck);
        //var_dump($userDeck);


        //removeComp($compDeck, $i);
        //removeUser($userDeck, $j);
    }else{
        $wynik = "Gracz wygrywa potyczkę <br>";
        //echo $compDeckSize;
        //echo $userDeckSize;
        $_SESSION["myPoints"] += $userScore + $computerScore;

        if(!isset($userWon)){
            $userWon = [];
        }

        array_push($userWon, $computerChoice[$i]);
        array_push($userWon, $userChoice[$j]);
        removeComp($compDeck, $i);
        removeUser($userDeck, $j);

        array_push($userDeck, $computerChoice[$i]);
        removeComp($compDeck, $i);

        $arr = json_encode($userDeck);
        file_put_contents("compDeck.txt", $arr);

        $userDeckSize = sizeof($userDeck);
        $compDeckSize = sizeof($compDeck);


       /* echo "Po walce";
        echo $compDeckSize;
        echo $userDeckSize;

        var_dump($compDeck);
        var_dump($userDeck);
        var_dump($userWon);*/
        //removeUser($userDeck, $j);

        //removeComp($compDeck, $i);
        //removeUser($userDeck, $j);
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
    <?php
    if(isset($wynik)){
        echo $wynik;
        echo "Komputer:".$_SESSION["compPoints"];
        echo '<div><img class="card" src='.$computerChoice[$i]["img"].'></div>';
        echo "pozostałe karty: ".$compDeckSize."<br>";
        echo "Gracz:".$_SESSION["myPoints"];
        echo '<div><img class="card" src='.$userChoice[$j]["img"].'></div>';
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