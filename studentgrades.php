<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Grades and Stat - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/inputGrades.js" type="text/javascript"></script>
</head>


<?php include 'view/header.php';

spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
$assessments = $db->getAllAssessment();
$students = $db->getAllStudents();
?>

<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Input Grades</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                <li class="breadcrumb-item active">Input Grades</li>
            </ol>

            <body>
                <div style="display: block;
                        text-transform: uppercase;
                        text-align: center;
                        padding: 1rem;
                        color: #fff;
                        background: #343a40;"class="container" style="text-align: center; margin-top: 5%;">
                    <h1>Select an assessment</h1>
                    <form action="">
                        <select onchange="fetchAssignmentSelect(this.value);" class="form-select-lg mb-3" style="width: 20%;" name="assessment" id="assessment">
                            <option value="default" selected></option>
                            <?php

                            for ($i = 0; $i < count($assessments); $i++) {
                                echo '<option value="' . $assessments[$i]['id'] . '">' . $assessments[$i]['name'] . '</option>';
                            }

                            ?>
                        </select>
                    </form>

                    <br>
                    <hr>
                    <br>
                    <h4>Students</h4>
                    <button class="btn btn-block btn-secondary" style="width: 20%;" name="previous" id="previous" type="button" onclick="previousUser();">Previous</button>
                    <select onchange="fetchUserSelect(this.value);" class="form-select-lg mb-3" style="width: 20%;" name="students" id="students">
                        <option value="default" selected></option>
                        <?php
                        for ($i = 0; $i < count($students); $i++) {
                            echo '<option value="' . $students[$i]['id'] . '">' . $students[$i]['firstName'] . ' ' . $students[$i]['lastName'] . '</option>';
                        }
                        ?>
                    </select>
                    <button class="btn btn-block btn-secondary" style="width: 20%;" name="next" id="next" type="button" onclick="nextUser();">Next</button>

                    <p id="notification"></p>
                    <p id="printAjax"></p>

                </div>

                <?php
                unset($_SESSION['selectedAssignment']);
                unset($_SESSION['selectedStudent']);
                ?>

            </body>


    </main>


    <?php include 'view/footer.php' ?>

</html>