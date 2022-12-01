<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
$assessments = $db->getAllAssessment();
$students = $db->getAllStudents();
?>

<!DOCTYPE html>
<html>

<head>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="../js/inputGrades.js" type="text/javascript"></script>
</head>

<body>
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

    </div>

    <?php
    unset($_SESSION['selectedAssignment']);
    unset($_SESSION['selectedStudent']);
    ?>

</body>

</html>