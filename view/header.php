<?php
session_start();

?>

<head>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/inputGrades.js" type="text/javascript"></script>
</head>



<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark ">
        <!-- Navbar Brand-->
        <div class="row">
            <div class=".col-md-4">
                <center>
                    <a class="navbar-brand ps-3 h1 text-center" href="index.php">MGMS</a><br>
                </center>
                <p class="text-light font-italic h6">Grade Management System</p>
            </div>


        </div>




        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>


        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-light">
            <?php
            if (!isset($_SESSION['loggedInUser'])) {
                echo "Not logged in";
            } else {
                echo $_SESSION['loggedInUser']['firstName'] . ' ' . $_SESSION['loggedInUser']['lastName'];
            }
            ?>



        </div>
        <!-- Navbar-->


        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" href="#" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <?php if (!isset($_SESSION['loggedInUser'])) : ?>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>


                    <?php endif; ?>

                    <?php if (isset($_SESSION['loggedInUser'])) : ?>
                        <li><a class="dropdown-item" href="profileView.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="controller/logout.php">Logout</a></li>
                    <?php endif; ?>


                </ul>
            </li>
        </ul>
    </nav>

    <!-- Modals-->


    <!-- Login modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalTitle">Login</h5>
                </div>
                <div class="modal-body">

                    <form action="controller/loginController.php" method="post">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <div id="emailHelp" class="form-text">If you are not registered, <a class="link-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign up</a></div>
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-block btn-primary pull-right" style="width: 20%;" type="submit" name="Login" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register modal-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalTitle">Register</h5>
                </div>
                <div class="modal-body">
                    <form action="controller/registerUserController.php" method="post">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value=<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : '' ?>>
                            <div id="emailHelp" class="form-text">If you are registered, <a class="link-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</a></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value=<?php echo (isset($_SESSION['confirmPassword'])) ? $_SESSION['confirmPassword'] : '' ?>>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value=<?php echo (isset($_SESSION['firstName'])) ? $_SESSION['firstName'] : '' ?>>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value=<?php echo (isset($_SESSION['lastName'])) ? $_SESSION['lastName'] : '' ?>>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-block btn-primary pull-right" style="width: 20%;" type="submit" name="Register" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php if (isset($_SESSION['loggedInUser'])) : ?>
                            <?php if ($_SESSION['loggedInUser']['accessLevel'] == 1) : ?>
                                <div class="sb-sidenav-menu-heading">Professor Pages</div>
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Prof Dashboard
                                </a>
                                <a class="nav-link" href="add.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Add Assesment
                                </a>
                                <a class="nav-link" href="inputGradesView.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Input Grades
                                </a>
                                <a class="nav-link" href="studentlist.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Student List
                                </a>
                            <?php endif; ?>
                            <?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) : ?>
                                <div class="sb-sidenav-menu-heading">Student Pages</div>
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Student Dashboard
                                </a>
                                <a class="nav-link" href="myass.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    My Assesments
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="sb-sidenav-menu-heading">Core Pages</div>
                        <?php if (!isset($_SESSION['loggedInUser'])) : ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>

                                </nav>
                            </div>
                        <?php endif; ?>

                        <a class="nav-link" href="about.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-question"></i></div>
                            About this class
                        </a>
                    </div>
                </div>
                <?php if (isset($_SESSION['rError'])) : ?>
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button><strong>&ensp;Error! </strong> <?php echo $_SESSION['rError']; ?>
                    </div>
                    <?php session_destroy();
                    unset($_SESSION['Error']); ?>
                <?php endif; ?>

                <?php if (isset($_GET['rSuccess'])) : ?>
                    <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                        <button type="button" class="close btn btn-success" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button><strong>&ensp;Success!</strong> User Has Been Created
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['logerror'])) : ?>

                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button><strong> &ensp;Error!</strong> Invalid Credentials
                    </div>
                <?php endif; ?>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    if (isset($_SESSION['loggedInUser'])) {
                        if ($_SESSION['loggedInUser']['accessLevel'] == 1) {
                            echo "Professor";
                        } elseif ($_SESSION['loggedInUser']['accessLevel'] == 0) {
                            echo "Student";
                        }
                    } else {
                        echo "Guest";
                    }

                    ?>




                </div>

            </nav>

        </div>