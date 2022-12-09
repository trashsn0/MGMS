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
                            <p class="lead">This site was created for our SOEN 287 final Project</p>
                            
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
                                        <th scope="row">40156779</th>
                                        <td>Bogdan</td>
                                        <td>Baloiu</td>
                                        <td><a href="https://github.com/Bogdan2709">@Bogdan2709</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">40156534</th>
                                        <td><i>Chandler</i></td>
                                        <td><i>Higgins</i></td>
                                        <td><a href="https://github.com/GoingBarDown">@GoingBarDown</a></td>
                                    </tr>


                                    <tr>
                                        <th scope="row"><s>40123208</s></th>
                                        <td><s>Peter</s></td>
                                        <td><s>Rentopoulos</s></td>
                                        <td><a href="https://github.com/beterbuilds"><s>@beterbuilds</s></a></td>

                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
           
                </main>


               <?php include 'view/footer.php' ?>
</html>
