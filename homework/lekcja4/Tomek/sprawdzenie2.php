<?php
    session_start();
    include_once 'partial/header.php';
    require 'dane.php';
    ob_start();
    $index = $_SESSION['indexTablicy'] + 1;
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
               
                    for($i=$index; $i<$index +1; $i++){
                        echo '<img src="'.$_SESSION['komputer'][$i]['img'].'">';
                        print_r($_SESSION['komputer'][$i]['nazwa']);
                        echo " "; 
                        print_r($_SESSION['komputer'][$i]['kolor']);
                        echo "<br />";                    
                    }
                    //var_dump($_SESSION['komputer']);
                    //$_SESSION['komputer'] = $karty_komputer;
                ?>
            </div>           
            
            
            <div id="dziecko3" class="container">
                <b>Gracz: </b><br>
                <?php  

                    for($i=$index; $i<$index +1; $i++){
                        echo '<img src="'.$_SESSION['gracz'][$i]['img'].'">';
                        print_r($_SESSION['gracz'][$i]['nazwa']);
                        echo " "; 
                        print_r($_SESSION['gracz'][$i]['kolor']);
                        echo "<br />"; 
                    }
                    //var_dump($_SESSION['gracz']);
                    //$_SESSION['gracz'] = $karty_gracza;
                    $_SESSION['indexTablicy'] = $index;
                ?>
                
            </div>
            
            <div id="dziecko2" class="container">
                <b>Wynik: </b><br>
                <?php               
                    
                /*
                    $odpowiedz = [
                    1 => "komputer wygrał",
                    0 => "remis",
                    -1 => "gracz wygrał"
                ];               
                echo $odpowiedz[$_SESSION['komputer'][0]['moc'] <=> $_SESSION['gracz'][0]['moc']];
                
                
                    if($_SESSION['komputer'][0]['moc'] > $_SESSION['gracz'][0]['moc']){
                        echo "komputer wygrał";
                        echo "<br />";   
                        array_push($_SESSION['komputer'], $_SESSION['komputer'][0], $_SESSION['gracz'][0]);
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                        
                    }elseif($_SESSION['komputer'][0]['moc'] == $_SESSION['gracz'][0]['moc'] ){
                        echo "remis";
                    }else{
                        echo "Gracz wygrał";
                        echo "<br />";
                        array_push($_SESSION['gracz'], $_SESSION['gracz'][0], $_SESSION['komputer'][0]);
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                    }                
                    
                    //var_dump($_SESSION['komputer']);
                 * 
                 */
                ?>
                <br>
                <br>
                <br>
                <a href="sprawdzenie.php" class="btn btn-primary">Sprawdź!!!</button></a>
                
            </div>          
        </div>
    </body>
</html>