<?php
if (file_exists("Gallery.php")) {
    require 'Gallery.php';
} else {
    exit("<h1>something wrong</h1>");
}

/* function requestGetVariable(string $name, string $default = ''): string
  {
  if(isset($_GET[$name])){
  $lol = $_GET[$name];
  }else{
  $lol = $default;
  }

  return $lol;
  }
  $id = requestGetVariable("id");
 * nie potrafie utworzyc dobrego "ifa" zeby mi dzialal razem z ta funkcja, wydaje mi sie ze tak jest latwiej.
 */
//file_put_contents("baza.txt", json_encode($gallery));
$baza_Lokalna = json_decode(file_get_contents("baza.txt"), true);
//var_dump($baza_Lokalna);
//$baza_Lokalna['likeId']=+1;
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
                position:realtive;
            }
            .jumbotron .btn 
            {
                position: absolute;
                top: 10%;
                left: 25%;
                font-size: 20px;
                padding: 12px 24px;
                cursor: pointer;

            }

            .btn-secondary
            {
                background-color:transparent;
                color:#c7098b;
                border-color:#c7098b;
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                for ($i = 0; $i <= count($gallery); $i++) {

                    if ($id == $i) {

                        echo '<a href="ZadDom.php"><img src="' . $gallery[$id]['img'] . '" class="img-fluid" alt="Responsive image"/></a> '
                        . '<a class="btn btn-secondary" href="ZadDom.php?id=' . $id . '&likeId=' . $gallery[$id]['likeId'] . '&wstecz" role="button">Like</a>';

                        if (isset($_GET['likeId']) && isset($_GET['wstecz'])) {
                            //var_dump($baza_Lokalna);
                            $baza_Lokalna[$id]['likeId'] = $baza_Lokalna[$id]['likeId'] + 1;
                            file_put_contents("baza.txt", json_encode($baza_Lokalna));
                            header("Location: ZadDom.php?id=$id");
                        }

                        echo 'Likes: ' . $baza_Lokalna[$id]['likeId'];
                    }
                }
            } else {

                echo '<a href ="ZadDom.php"><img src="' . $gallery[rand(0, count($gallery) - 1)]['img'] . '" class="img-fluid"/></a> ';
            }
            ?>  


        </div>

        <div class="container">
            <div class="kolumna">

                <div class="box">
<?php
for ($i = 0; $i < count($gallery); $i++) {
    echo '<a href ="ZadDom.php?id=' . $gallery[$i]['id'] . '"><img src="' . $gallery[$i]['img'] . '" class="card-img-top  "/></a> ';
}
?>

                </div>
            </div>
        </div>


    </body>   


</head>



</html>