<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
$assessments = $db->getAllAssessment();
?>

<!DOCTYPE html>
<html>

<head>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class=" vertical-center">
        <div class="container" style="text-align: center;">

            <h1>Select an assessment</h1>

            <form action="">
                <select class="form-select-lg mb-3" style="width: 20%;" name="assessment" id="assessment">
                    <option value="" selected></option>
                    <?php

                    for ($i = 0; $i < count($assessments); $i++) {
                        echo "<option value='" . $assessments[$i]['id'] . "'>" . $assessments[$i]['name'] . "</option>";
                    }

                    ?>
                </select>
            </form>

            <!-- USE AJAX TO POPULATE STUDENTS SELECT BELOW -->

            <br>
            <hr>
            <br>
            <h4>Students</h4>
            <form action="">
                <input class="btn btn-block btn-secondary" style="width: 20%;" type="submit" name="previous" value="Previous">
                <select class="form-select-lg mb-3" style="width: 20%;" name="students" id="students">
                    <option value="" selected></option>
                </select>
                <input class="btn btn-block btn-secondary" style="width: 20%;" type="submit" name="next" value="Next">
            </form>

            <!-- USE AJAX TO GET QUESTIONS / STUDENT  -->

        </div>
    </div>


</body>

</html>