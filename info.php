<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HelloWorld - MGMS</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    

<?php include 'view/header.php';?>
            
            <div id="layoutSidenav_content">
                

                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">About the Website</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                            <li class="breadcrumb-item active">About the Site</li>
                        </ol>

        


            </header>
            <!-- About section-->
            <br>
            <section id="about">
                <div class="container px-4">
                    <div class="row gx-4 ">
                        <div class="col-lg-8">
                            <h2>About the site</h2>
                            <p class="lead">This place is for orginizing ourselves and plan ahead to complete the website</p>
                            <ul>
                                <li>Regroup the team info</li>
                                <li>Designing core feature and website layout</li>
                                <li>Assigning task to team members</li>
                                <li>Keep track of progress</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Team section-->
            <br><br>
            <section class="bg-light" id="team">
                <div class="container px-4">
                    <div class="row gx-4 justify-content-center">
                        <div class="col-lg-8">
                            <h2>Authors</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Github</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">40181481</th>
                                        <td>Christopher</td>
                                        <td>Recio</td>
                                        <td><a href="https://github.com/ChrisRecio">@ChrisRecio</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">40126607</th>
                                        <td>Samuel</td>
                                        <td>Palti</td>
                                        <td><a href="https://github.com/trashsn0">@trashsn0</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">40123208</th>
                                        <td>Peter</td>
                                        <td>Rentopoulos</td>
                                        <td><a href="https://github.com/beterbuilds">@beterbuilds</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">40156779</th>
                                        <td>Bogdan</td>
                                        <td>Baloiu</td>
                                        <td><a href="https://github.com/Bogdan2709">@Bogdan2709</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">40156534</th>
                                        <td>Chandler</td>
                                        <td>Higgins</td>
                                        <td><a href="https://github.com/GoingBarDown">@GoingBarDown</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
            <!-- plan section-->
            <section id="plan">
                <div class="container px-4">
                    <div class="row gx-4 ">
                        <div class="col-lg-8">
                            <h2>Plan for the website</h2>
                            <p><b>Website Architechture</b></p>
                            <img src="assets/img/SitePlan.png" width="1300" height="600">


                            <p><b>Overall progress</b></p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 68%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">68%</div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>


            <br><br><br>
            <h1>Charts exemple you can use</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart Example
                        </div>
                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
           
                   
                        

                    
                </div>
                </main>


               <?php include 'view/footer.php' ?>
</html>
