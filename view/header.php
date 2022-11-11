<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark ">
            <!-- Navbar Brand-->
            <div class="row">
                <div class=".col-md-4"><center>
                    <a class="navbar-brand ps-3 h1 text-center" href="index.php">MGMS</a><br></center>
                    <p class="text-light font-italic h6">Grade Management System</p>
                </div>
                

            </div>
            
            
        
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            

            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-light">Account Name</div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Student Pages</div>
                            <a class="nav-link" href="studentdash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Student Dashboard
                            </a>
                            <a class="nav-link" href="mygrades.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                My Grades
                            </a>
                            <a class="nav-link" href="myass.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                My Assesments
                            </a>
                            <div class="sb-sidenav-menu-heading">Professor Pages</div>
                            <a class="nav-link" href="profdash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Prof Dashboard
                            </a>
                            <a class="nav-link" href="add.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Add Assesment
                            </a>
                            <a class="nav-link" href="studentgrades.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Student Grades and Statistics
                            </a>
                            <a class="nav-link" href="studentlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Student List
                            </a>


                            <div class="sb-sidenav-menu-heading">Core Pages</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                 Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="main/view/loginView.php">Login</a>
                                    <a class="nav-link" href="main/view/registerUserView.php">Register</a>
                                    <a class="nav-link" href="#">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="about.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-question"></i></div>
                                About this class
                            </a>
                            <a class="nav-link" href="helloworld.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Hello World
                            </a>
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Student/Professor
                    </div>
                </nav>
            </div>