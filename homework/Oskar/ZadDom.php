<?php
if(file_exists("Gallery.php"))
 {
require 'Gallery.php';
 }else 
 {
     exit("<h1>something wrong</h1>");
 }
 
 ?>
<html> 

    <head>
        
    <title>My Gallery</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container
        {
             background-color:#343a40;
             max-width:inherit;
        }
        .kolumna
        {
            
        }
        .card-img-top
        {
            width:23%;
            height:23%;
            margin:1% 1% 0.5% 0.5%;
            border-radius:10px;
        }
     .jumbotron
     {
         background-color:#343a40;
         margin: 0 0 0 0;
        
     }
     
     .img-fluid
     {
         width:1080px;
         height:720px;
        display:block;
        margin-left:auto;
        margin-right:auto;
     }
      
    </style>
    
    <body>
        
       
            <div class="jumbotron">
                <?php 
                if(isset($_GET['id'])) 
                {
                    $id = $_GET['id'];
                    for($i = 0; $i <=15; $i++)
                    {
                    
                        if($id == $i)
                        {
                            echo '<a href="ZadDom.php"><img src="'.$gallery[$id]['img'].'" class="img-fluid" alt="Responsive image"/></a> ';
                        } 
                    }
                    
                  }else 
                  {
                      echo '<a href ="ZadDom.php"><img src="'.$gallery[rand(0,count($gallery)-1)]['img'].'" class="img-fluid"/></a> ';
                      
                  }     
                  ?>
            </div>
       
            <div class="container">
                <div class="kolumna">
                
                     <div class="box">
                         <?php
                         for( $i = 0; $i < count($gallery); $i++)
                         {
                            echo '<a href ="ZadDom.php?id='.$gallery[$i]['id'].'"><img src="'.$gallery[$i]['img'].'" class="card-img-top  "/></a> ';
                         }
                         ?>
          
                    </div>
                </div>
            </div>
        
        
    </body>   
        
        
    </head>



</html>