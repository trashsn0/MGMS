<?php
include "dashboardHeaderView.php";
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php

    echo '<br><br><br>';
    var_dump($_SESSION['loggedInUser']);
    echo "<a href='../view/loginView.php'>Back</a>";

    ?>

</body>

</html>