<?php


spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
$assessments = $db->getAllAssessment();
$students = $db->getAllStudents();

include "view/header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGMS - Grade Management System </title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/inputGrades.js" type="text/javascript"></script>
</head>

<body>



    <div id="layoutSidenav_content">


        <main>
            <div class="container-fluid px-4">





                <div class="container" style="text-align: center; margin-top: 5%;">
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







        </main>
    </div>


    </div>

    <?php
    unset($_SESSION['selectedAssignment']);
    unset($_SESSION['selectedStudent']);
    include "view/footer.php";
    ?>

</body>

</html>