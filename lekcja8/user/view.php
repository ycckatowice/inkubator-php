<?php
require_once '../partial_view/header.php';

// getRequestGetVariable id

// if not set redirect:  /lekcja8/user/all.php?selectId


//userFindOneById

// if no user redirect: /lekcja8/user/all.php?userNotExistsId=' . $id


?>
<h1>View user: <?= $id ?></h1>


<?php
// Show user view
?>



<?php
require_once '../partial_view/footer.php';
