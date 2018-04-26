<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/lekcja8/">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if (Authorization::isAuthorizedRole(Authorization::ROLE_ADMIN)) {
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="/lekcja8/user/all.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lekcja8/category/all.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lekcja8/product/all.php">Product</a>
                    </li>';
            }
            ?>

            <?php
            if (Authorization::isAuthorizedAny()) {
                echo '
                    <li class="nav-item float-right">
                     <a class="nav-link" href="/lekcja8/logout.php">Logout</a>
                   </li>
               ';
            }
            ?>


        </ul>

    </div>
</nav>