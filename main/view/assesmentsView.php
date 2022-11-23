<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <br><br><br>
    <h1>TODO</h1>
    <p>Put a table of all the assessment here</p>

    <?php
    $assessment = $db->getAllAssessment();
    var_dump($assessment);
    ?>

</body>

</html>