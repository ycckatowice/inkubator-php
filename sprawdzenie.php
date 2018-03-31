<?php
    session_start();
    include_once 'partial/header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        #rodzic {
            background-color:white;
            border:3px dashed red;
            font-size:1.4em;
            height: 250px;
        }

        #dziecko1 {
            float: left;
            width:35%;
            height: 100%;
            background-color:lightblue;
        }

        #dziecko2 {
            float: left;
            width:30%;
            height: 100%;
            background-color:lightgreen;
        }
        #dziecko3{
            float: left;
            width:35%;
            height: 100%;
            background-color: #ff9e3e;      
        }
        img{
            border-radius: 7px;
        }
        
        </style>
    </head>
    <body>
        
        <div id="rodzic" class="container">           
            <div id="dziecko1" class="container">
                <b>Komputer: </b><br>
                
                <?php               
               
                    for($i=0; $i<1; $i++){
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

                    for($i=0; $i<1; $i++){
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
                    
                    if($_SESSION['komputer'][0]['moc'] > $_SESSION['gracz'][0]['moc']){
                        echo "komputer wygrał";
                    }elseif($_SESSION['komputer'][0]['moc'] == $_SESSION['gracz'][0]['moc'] ){
                        echo "remis";
                    }else{
                        echo "Gracz wygrał";
                    }               
                ?>
                <br>
                <a href="index.php" class="btn btn-primary">Wróć</button></a>                  
            </div>          
        </div>
    </body>
</html>
