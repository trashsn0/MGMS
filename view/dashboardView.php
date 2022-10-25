<!DOCTYPE html>
<html>

<head>
    <title>MGMS - Grade Management System </title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>

    <?php

    session_start();

    var_dump($_SESSION['loggedInUser']);

    echo "<a href='../view/loginView.php'>Back</a>";

    ?>

</body>

</html>