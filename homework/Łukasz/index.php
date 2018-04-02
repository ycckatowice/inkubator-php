<?php

    session_start();

    define("BASE_POINTS", 0);

    if(!isset($_SESSION["myPoints"]) || !isset($_SESSION["compPoints"])) {
        game();
    }
    require_once "data.php";

    $deck = json_encode($data);
    file_put_contents("deck.txt", $deck);

    function game()
    {
        $_SESSION["myPoints"] = BASE_POINTS;
        $_SESSION["compPoints"] = BASE_POINTS;
    }

    if(isset($_GET['choice']) && $_GET['choice'] === "play"){
        $dataSize = sizeof($data);
        $computerChoice = $data[rand(0, $dataSize - 1)];
        $userChoice = $data[rand(0, $dataSize -1)];

        $computerScore = $computerChoice['strength'];
        $userScore = $userChoice['strength'];

        if($computerChoice['strength'] > $userChoice['strength']){
            echo "Komputer wygrywa potyczkę <br>";
            $_SESSION["compPoints"] += $computerScore + $userScore;
        }else if ($computerChoice === $userChoice){
            echo"Wojna!";
        }else{
            echo "Gracz wygrywa potyczkę <br>";
            $_SESSION["myPoints"] += $userScore + $computerScore;
        }


        if($_GET['choice'] == 'end'){
            header("Location: index.php");
        }

    }else{
        game();
        $computerChoice ="";
        $userChoice ="";
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