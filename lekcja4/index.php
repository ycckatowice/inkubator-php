<?php
    include_once 'partial/header.php';
?>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="first-slide" src="img/header.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
        <div class="carousel-item ">
              <img class="first-slide" src="img/header.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <?php 
            for($i = 0; $i < count($dane); $i++){
                echo '<div class="col-lg-4">
                        <img class="rounded-circle" src="'.$dane[$i]['img'].'" alt="Generic placeholder image" width="140" height="140">
                        <h2>'.$dane[$i]["nazwa"] .'</h2>
                        <p>'. $dane[$i]["opis"] .'</p>
                        <p><a class="btn btn-secondary" href="order.php?order_id='.$dane[$i]['id'].'" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->';
            }
            
            ?>
         

        </div><!-- /.row -->

      </div><!-- /.container -->


<?php
    include_once 'partial/footer.php';
?>
