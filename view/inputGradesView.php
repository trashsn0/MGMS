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
    <div class="vertical-center" style="margin-top: 5%;">
        <div class="container" style="text-align: center;">
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
            <form action="">
                <input class=" btn btn-block btn-secondary" style="width: 20%;" type="button" name="previous" value="Previous" onclick="previous();">
                <select onchange="fetchUserSelect(this.value);" class="form-select-lg mb-3" style="width: 20%;" name="students" id="students">
                    <option value="default" selected></option>
                    <?php

                    for ($i = 0; $i < count($students); $i++) {
                        echo '<option value="' . $students[$i]['id'] . '">' . $students[$i]['firstName'] . ' ' . $students[$i]['lastName'] . '</option>';
                    }

                    ?>
                </select>
                <input class="btn btn-block btn-secondary" style="width: 20%;" type="button" name="next" value="Next" onclick="next();">
            </form>

            <?php if (isset($_SESSION['Error'])) : ?>
                <div class="alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Error! </strong> <?php echo $_SESSION['Error']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])) : ?>
                <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Success!</strong> Grades Have Been Updated
                </div>
            <?php endif; ?>

            <p id="notification"></p>
            <p id="printAjax"></p>

        </div>
    </div>

    <?php
    unset($_SESSION['Error']);
    unset($_SESSION['success']);
    unset($_SESSION['selectedAssignment']);
    unset($_SESSION['selectedStudent']);
    ?>

</body>

</html>