<?php
    session_start();
    include_once 'partial/header.php';
    
    if(isset($_SESSION['indexTablicy'])){
        $index = $_SESSION['indexTablicy'];
    }else{
        $index = 0;
        $_SESSION['indexTablicy'] = $index;
    }
    
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
                    //echo $_SESSION['indexTablicy'];
                    for($i=$index; $i<$index +5; $i++){
                        echo '<img src="'.$_SESSION['komputer'][$i]['img'].'">';
                        print_r($_SESSION['komputer'][$i]['nazwa']);
                        echo " "; 
                        print_r($_SESSION['komputer'][$i]['kolor']);
                        echo "<br />";                    
                    }                                    
                ?>
            </div>           
            
            
            <div id="dziecko3" class="container">
                <b>Gracz: </b><br>
                <?php  

                    for($i=$index; $i<$index +5; $i++){
                        echo '<img src="'.$_SESSION['gracz'][$i]['img'].'">';
                        print_r($_SESSION['gracz'][$i]['nazwa']);
                        echo " "; 
                        print_r($_SESSION['gracz'][$i]['kolor']);
                        echo "<br />"; 
                    }                    
                ?>
            </div>
            
            <div id="dziecko2" class="container">
                <b>Wynik: </b><br>
                <?php               
                    function remis($index){
                    //var_dump($index);
                    if($_SESSION['komputer'][$index]['moc'] > $_SESSION['gracz'][$index]['moc']){
                        echo "komputer wygrał";
                        echo "<br />";   
                        array_push($_SESSION['komputer'], $_SESSION['komputer'][$index], $_SESSION['gracz'][$index], 
                            $_SESSION['komputer'][$index+1], $_SESSION['gracz'][$index+1], 
                            $_SESSION['komputer'][$index+2], $_SESSION['gracz'][$index+2]
                        );
                        unset($_SESSION['komputer'][$index]);
                        unset($_SESSION['gracz'][$index]);   
                        unset($_SESSION['komputer'][$index+1]);
                        unset($_SESSION['gracz'][$index+1]);
                        unset($_SESSION['komputer'][$index+2]);
                        unset($_SESSION['gracz'][$index+2]);
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                        $_SESSION['indexTablicy'] = $index+2;
                        
                    }elseif($_SESSION['komputer'][$index+2]['moc'] == $_SESSION['gracz'][$index+2]['moc'] ){
                        echo "<br />";
                        //echo "<br />";
                        echo "remis";
                        remis($index);
                        
                        //array_push($_SESSION['komputer'], $_SESSION['komputer'][$index]);
                        //array_push($_SESSION['gracz'], $_SESSION['gracz'][$index]);
                        //unset($_SESSION['komputer'][$index]);
                        //unset($_SESSION['gracz'][$index]);
                        //$_SESSION['indexTablicy'] = $index - 1;
                    }else{
                        echo "Gracz wygrał";
                        echo "<br />";
                        array_push($_SESSION['gracz'], $_SESSION['gracz'][$index], $_SESSION['komputer'][$index], 
                            $_SESSION['gracz'][$index+1], $_SESSION['komputer'][$index+1], 
                            $_SESSION['gracz'][$index+2], $_SESSION['komputer'][$index+2]
                        );
                        unset($_SESSION['komputer'][$index]);
                        unset($_SESSION['gracz'][$index]);
                        unset($_SESSION['komputer'][$index+1]);
                        unset($_SESSION['gracz'][$index+1]); 
                        unset($_SESSION['komputer'][$index+2]);
                        unset($_SESSION['gracz'][$index+2]);                                                 
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                        $_SESSION['indexTablicy'] = $index+2;
                    } 
                        $index = $index+3;
                        return $index;
                        return $_SESSION['komputer'];
                        return $_SESSION['gracz'];
                        $_SESSION['indexTablicy'] = $index;
                        //var_dump($_SESSION['indexTablicy']);   
                    }
                   //$index = $_SESSION['indexTablicy'];
                /*
                    $odpowiedz = [
                    1 => "komputer wygrał",
                    0 => "remis",
                    -1 => "gracz wygrał"
                ];               
                echo $odpowiedz[$_SESSION['komputer'][0]['moc'] <=> $_SESSION['gracz'][0]['moc']];
                */
                    
                    if($_SESSION['komputer'][$index]['moc'] > $_SESSION['gracz'][$index]['moc']){
                        echo "komputer wygrał";
                        echo "<br />";   
                        array_push($_SESSION['komputer'], $_SESSION['komputer'][$index], $_SESSION['gracz'][$index]);
                        unset($_SESSION['komputer'][$index]);
                        unset($_SESSION['gracz'][$index]);
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                        $_SESSION['indexTablicy'] = $index;
                        
                    }elseif($_SESSION['komputer'][$index]['moc'] == $_SESSION['gracz'][$index]['moc'] ){
                        //echo "<br />";
                        //echo "<br />";
                        echo "remis";
                        remis($index);

///////////////////////////////////

   ///////////////////////////////////////                 
                        //array_push($_SESSION['komputer'], $_SESSION['komputer'][$index]);
                        //array_push($_SESSION['gracz'], $_SESSION['gracz'][$index]);
                        //unset($_SESSION['komputer'][$index]);
                        //unset($_SESSION['gracz'][$index]);
                        //$_SESSION['indexTablicy'] = $index - 1;
                    }else{
                        echo "Gracz wygrał";
                        echo "<br />";
                        array_push($_SESSION['gracz'], $_SESSION['gracz'][$index], $_SESSION['komputer'][$index]);
                        unset($_SESSION['komputer'][$index]);
                        unset($_SESSION['gracz'][$index]);                        
                        echo "liczba kart komputera: ";
                        echo count($_SESSION['komputer']);
                        echo "<br />";
                        echo "liczba kart gracza: ";
                        echo count($_SESSION['gracz']);
                        $_SESSION['indexTablicy'] = $index;
                    }                
                    



                    //var_dump($_SESSION['komputer']);
                ?>
                <br>
                <a href="sprawdzenie2.php" class="btn btn-primary">Wróć</button></a>
                <?php
                echo "<br />";
                echo "liczba stoczonych wojen: ";
                echo $index +1;
                ?>
            </div>          
        </div>
    </body>
</html>
