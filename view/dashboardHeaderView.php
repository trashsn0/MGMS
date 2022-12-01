<?php
session_start();
// Check if user session is set
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: ../View/loginView.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGMS - Grade Management System </title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="dashboardView.php">MGMS</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-nav ml-auto ">
                    <!-- Show Teacher Options -->
                    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 1) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Assessment
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="assesmentsView.php">View All</a>
                                <a class="dropdown-item" href="createAssessmentView.php">New Assessment</a>
                                <a class="dropdown-item" href="inputGradesView.php">Input Grades</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="statisticsView.php">Statistics</a></li>
                    <?php endif; ?>
                    <!-- Show Student Options -->
                    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) : ?>
                        <li class="nav-item"><a class="nav-link" href="assesmentsView.php">Assessment</a></li>
                        <li class="nav-item"><a class="nav-link" href="statisticsView">Statistics</a></li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['loggedInUser']['firstName'] . ' ' . $_SESSION['loggedInUser']['lastName']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profileView.php">Profile</a>
                            <a class="dropdown-item" href="../controller/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</body>

</html>