<?php
    //$_SESSION = array();
    //session_destroy();
    
    session_start();
    $_SESSION['indexTablicy'] = 0;
    include_once 'partial/header.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gra karciana wojna</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <div id="rodzic" class="container">           
            <div id="dziecko1" class="container">
                <b>Komputer: </b><br>
                
                <?php                               
                    shuffle($dane);                
                    $karty_komputer = array_slice($dane, 0, 26);                                
                    $ile = count($karty_komputer);               
                    for($i=0; $i<6; $i++){
                        echo '<img src="'.$karty_komputer[$i]['img'].'">';
                        print_r($karty_komputer[$i]['nazwa']);
                        echo " "; 
                        print_r($karty_komputer[$i]['kolor']);
                        echo "<br />";                    
                    }
                    $_SESSION['komputer'] = $karty_komputer;
                ?>
            </div>           
            
            <div id="dziecko3" class="container">
                <b>Gracz: </b><br>
                <?php              
                    $karty_gracza = array_slice($dane, 26, 52);                    
                    $iles = count($karty_gracza);
                    for($i=0; $i<6; $i++){
                        echo '<img src="'.$karty_gracza[$i]['img'].'">';
                        print_r($karty_gracza[$i]['nazwa']);
                        echo " "; 
                        print_r($karty_gracza[$i]['kolor']);
                        echo "<br />";                       
                    }   
                    $_SESSION['gracz'] = $karty_gracza;
                ?>
            </div>
            
            <div id="dziecko2" class="container">
                <b>Wynik: </b><br>
                <br>
                <br>
                <br>
                <a href="sprawdzenie.php" class="btn btn-primary">Sprawdź!!!</button></a>
                  
            </div>          
        </div>
    </body>
</html>
