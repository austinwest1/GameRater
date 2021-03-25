<?php

require_once("Control/ControlSessionCheck.php");

?>
<!doctype html>
<html lang ="en-us">

<?php
    require_once('View/Common/header.php');
?>
<body>
    <header>
        <h1>Game Rater</h1>
    </header>
<?php
    require_once('View/Common/navigation.php');
?>

<div class = "row">
<?php
    require_once('View/Content/ViewAddReview.php');
?>
</div>


<?php
require_once('View/Common/footer.php');
?>
</body>
</html>