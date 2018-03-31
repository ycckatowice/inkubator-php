<?php
//    $_GET['wiek'] = $_GET['wiek'] + 15;
//    
//    var_dump($_GET);
//   
//    $tools = [
//        45, 12, 13, "ciąg znaków"
//    ];
//    
//    $monsters = [
//      "bear" => 'big monster',
//        "kogut", "chiken", "frog",
//        "jajko" => "small"
//    ];
//    
//    $monsters[] = "1222222";
//    $monsters["tygrys"] = "jest bardzo niebezpieczny";
//    
//    #echo $monsters['bear'];
//    #var_dump($monsters);
//    #var_dump($tools);

$tools = [
    "fist" => [
        "dmg" => 1,
        "img" => "tools/rsz_fist.png",
    ],
    "rock" => [
        "dmg" => 5,
        "img" => "tools/rsz_stone.png",
    ],
    "baseball" => [
        "dmg" => 15,
        "img" => "tools/rsz_baseball-bat.png",
    ],
    "gun" => [
        "dmg" => 50,
        "img" => "tools/rsz_gun.png",
    ]
];
$opcje = ["papier", "kamień", "nożyce"];

echo "Robię obliczanie elementów w tablicy opcje: " . sizeof($opcje);
echo "<br>Wypisuję losowy indeks z tablicy opcje:". rand(0, sizeof($opcje) - 1);
echo "<br>$opcje[2]";

if (isset($_GET['tool'])) {
    $tool = $_GET['tool'];
} else {
    $tool = 'fist';
}

if (isset($_GET['hp'])) {
    $hp = $_GET['hp'];
    $hp = $hp - $tools[$tool]['dmg'] ;
    echo "<br> Odejmuje: {$tools[$tool]['dmg']}, narzędziem: $tool, wartość: $hp";       
} else {
    $hp = 100;
}



?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <style>
             .monster{
                width: 300px;
             }
             .monster-box{
                  position: relative;
             }
             .monster-box img{
                width: 100%;
                cursor: url(<?php echo $tools[$tool]["img"]; ?>), auto;
               
             }
             .monster-dead{
                 position:absolute;
                 width:100%;
                 height:100%;
                 top:0;
                 background-color: #ff000066;
                 display: <?php if($hp < 1){ echo "block"; }else{ echo "none"; } ?>;
                 <?php //echo $hp < 1? "block":"none"; ?>
             }
         </style>
    </head>
    <body>
        <div class="container monster">

            <div class="monster-box">
                <a href="?hp=<?php echo $hp; ?>&tool=<?php echo $tool; ?>">
                    <img src="monsters/chicken.gif" alt=""/>
                </a> 
                <div class="monster-dead"></div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $hp;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="toolset btn-group">
                <a class="btn <?php if($tool == 'fist'){ echo "btn-success"; }else{ echo "btn-secondary"; } ?> " href="?tool=fist&hp=<?php echo (isset($_GET['hp']))? $hp + $tools['fist']['dmg']: $hp; ?>">Fist</a>
                <a class="btn <?php if($tool == 'rock'){ echo "btn-success"; }else{ echo "btn-secondary"; } ?>" href="?tool=rock&hp=<?php  echo (isset($_GET['hp']))? $hp + $tools['rock']['dmg']: $hp; ?>">Rock</a>
                <a class="btn <?php if($tool == 'baseball'){ echo "btn-success"; }else{ echo "btn-secondary"; } ?>" href="?tool=baseball&hp=<?php echo (isset($_GET['hp']))? $hp + $tools['baseball']['dmg']: $hp; ?>">Baseball</a>
                <a class="btn <?php if($tool == 'gun'){ echo "btn-success"; }else{ echo "btn-secondary"; } ?>" href="?tool=gun&hp=<?php echo (isset($_GET['hp']))? $hp + $tools['gun']['dmg']: $hp; ?>">Gun</a>
                <?php 
                    if($hp < 1){
                        echo "<a class=\"btn btn-primary\" href=\"index.php\">Play Again</a>";
                    }
                ?>
                
            </div>
        </div>

    </body>
</html>
