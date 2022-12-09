<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Create Assesment - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>


<?php include 'view/header.php';

spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
?>


<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View or Add Class Assesments</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                <li class="breadcrumb-item page">Add Assesment</li>
            </ol>




            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    .collapsible {
                        display: block;
                        text-transform: uppercase;
                        text-align: center;
                        padding: 1rem;
                        color: #fff;
                        background: #343a40;
                        cursor: pointer;
                        border-radius: 7px;
                        transition: all 0.25s ease-out;
                    }

                    .active,
                    .collapsible:hover {
                        background-color: #555;
                    }

                    .collapsible:hover .arrow {
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);

                    }

                    .collapsible:active .arrow.left {
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);

                    }

                    .content {
                        padding: 0 18px;
                        max-height: 0;
                        overflow: hidden;
                        transition: max-height 0.2s ease-out;
                        background-color: #f1f1f1;
                    }

                    .arrow {
                        border: solid black;
                        border-width: 0 3px 3px 0;
                        display: inline-block;
                        padding: 6px;
                        transform: rotate(135deg);
                        -webkit-transform: rotate(135deg);
                        transition: transform .2s ease-in-out;
                    }



                    .down {
                        border: solid black;
                        border-width: 0 3px 3px 0;
                        display: inline-block;
                        padding: 6px;
                        transform: rotate(45deg);
                        -webkit-transform: rotate(45deg);
                        transition: transform .2s ease-in-out;
                    }
                </style>

               

            </head>

            <body>

                <?php if ($_SESSION['loggedInUser']['accessLevel'] == 1) : ?>

                    <?php
                    $assessments = $db->getAllAssessment();
                    ?>

                    <?php for ($i = 0; $i < count($assessments); $i++) { ?>
                        <div class="vertical-center">
                            <button class="collapsible">
                                <table>
                                    <tr style="width: 2500px;">
                                        <th style="width: 2000px; text-align:center; padding-left: 25px;"><?php echo $assessments[$i]['name'] ?></th>


                                        <th class="arrow"></th>
                                    </tr>
                                </table>
                            </button>

                            <div class="content" style="text-align:center;">

                                <p>Number of questions: <?php echo $assessments[$i]['numberOfQuestions']; ?></p>
                                <p>Weight: <?php echo $assessments[$i]['weight']; ?></p>
                                <p>Due Date: <?php echo $assessments[$i]['dueDate']; ?></p>

                            </div>
                        </div>




                    <?php } ?>

                <?php endif; ?>

                <script>
                    var coll = document.getElementsByClassName("collapsible", );
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        });
                    }
                </script>
                
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addass" >Add assessment</button>
                


                    <div class="modal fade" id="addass" tabindex="-1" role="dialog" aria-labelledby="addassTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addassTitle">Add Assessment</h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">

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
                                    <input class="btn btn-block btn-primary pull-right" style="width: 20%;" type="submit" name="Add" value="Add">
                            </form>
                        </div>
                        </div>
                    </div>



            </body>


    </main>


    <?php include 'view/footer.php' ?>

</html>