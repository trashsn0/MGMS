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

                </br></br>

                <div style="text-align:center;">
                    <button style="background: #343a40;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addass">Add Assessment</button>
                </div>

                <?php if (isset($_SESSION['Error'])) : ?>
                </br>
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button><strong>&ensp;Error! </strong> <?php echo $_SESSION['Error']; ?>
                    </div>

                <?php endif; ?>

                <div class="modal fade" id="addass" tabindex="-1" role="dialog" aria-labelledby="addassTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addassTitle">Add Assessment</h5>
                            </div>
                            <div class="modal-body">




                                <form action="controller/createAssessmentController.php" method="post">


                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">

                                    </div>

                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Weight:</label>
                                        <input type="number" class="form-control" id="weight" name="weight">
                                    </div>

                                    <div class="mb-3">
                                        <label for="numberOfQuestions" class="form-label">Number of Questions: </label>
                                        <input type="number" class="form-control" id="numberOfQuestions" name="numberOfQuestions" min="1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dueDate" class="form-label">Due Date: </label>
                                        <input type="date" class="form-control" id="dueDate" name="dueDate">
                                    </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-block btn-primary" style="width: 20%;" type="submit" name="createAssessment" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addass" tabindex="-1" role="dialog" aria-labelledby="addassTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addassTitle">Remove Assessment</h5>
                            </div>
                            <div class="modal-body">




                                <form action="controller/createAssessmentController.php" method="post">


                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">

                                    </div>

                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Weight:</label>
                                        <input type="number" class="form-control" id="weight" name="weight">
                                    </div>

                                    <div class="mb-3">
                                        <label for="numberOfQuestions" class="form-label">Number of Questions: </label>
                                        <input type="number" class="form-control" id="numberOfQuestions" name="numberOfQuestions" min="1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dueDate" class="form-label">Due Date: </label>
                                        <input type="date" class="form-control" id="dueDate" name="dueDate">
                                    </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-block btn-primary" style="width: 20%;" type="submit" name="createAssessment" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    unset($_SESSION['Error']);
                    ?>

            </body>


    </main>


    <?php include 'view/footer.php' ?>

</html>