<div>
    <a href="?opcje=papier">papier</a>
    <a href="?opcje=kamień">kamień</a>
    <a href="?opcje=nożyce">nożyce</a>
</div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$opcje = ["papier", "kamień", "nożyce"];

// papier | papier <-- ok
// papier | kamień <-- ok
// papier | nożyce <-- ok
// kamień | papier <-- ok
// kamień | kamień <-- ok
// kamień | nożyce <-- ok
// nożyce | papier <-- ok
// nożyce | kamień <-- ok
// nożyce | nożyce <-- ok



if(isset($_GET['opcje'])){
    $wielkoscTablicy = sizeof($opcje);
    $wyborKomputera = $opcje[rand(0, $wielkoscTablicy - 1)];
    echo "Komputer wybrał:" . $wyborKomputera;
    echo "<br>Użytkownik wybrał: ". $_GET['opcje'];
    
    
    if($_GET['opcje'] == $wyborKomputera){
        echo "<h1>Remis</h1>";
        exit;
    }
    
    
    if($_GET['opcje'] == 'nożyce' && $wyborKomputera =='papier'
        || $_GET['opcje'] == 'kamień' && $wyborKomputera == "nożyce"
        || $_GET['opcje'] == 'papier' && $wyborKomputera == "kamień"
      ){
         echo "<h1>Wygrałeś</h1>";
         exit;
    }
    
    echo "<h1>Przegrałeś</h1>";

}



?>

