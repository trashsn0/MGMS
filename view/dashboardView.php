<?php
include "dashboardHeaderView.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>

    <!-- Show Teacher Options -->
    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 1) : ?>
        <div class="tabs">
            <input type="radio" id="assesments" name="tabs" checked="checked">
            <label for="assesments">View Classlist</label>
            <div class="tab">
                <h4>Assesments</h4>
            </div>
            <input type="radio" id="finalgrade" name="tabs">
            <label for="finalgrade">View Grades Per Student</label>
            <div class="tab">
                <h4>Your Cumulative Final Grade</h4>
            </div>
            <input type="radio" id="statistics" name="tabs">
            <label for="statistics">View Class Statistics</label>
            <div class="tab">
                <h4 style="text-align: left;">Standard Deviation</h4>
                <h4 style="text-align: right; padding-left: 700px;">Rank Percentile</h4>
            </div>
        </div>
    <?php endif; ?>

    <!-- Show Student Options -->
    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) : ?>
        <div class="tabs">
            <input type="radio" id="assesments" name="tabs" checked="checked">
            <label for="assesments">Grades Per Assesment</label>
            <div class="tab">
                <h4>Assesments</h4>
            </div>
            <input type="radio" id="finalgrade" name="tabs">
            <label for="finalgrade">Final Grade</label>
            <div class="tab">
                <h4>Your Cumulative Final Grade</h4>
            </div>
            <input type="radio" id="statistics" name="tabs">
            <label for="statistics">View Statistics</label>
            <div class="tab">
                <h4 style="text-align: left;">Standard Deviation</h4>
                <h4 style="text-align: right; padding-left: 500px;">Rank Percentile</h4>
            </div>
        </div>
    <?php endif; ?>



    <?php

    echo '<br><br><br>';
    var_dump($_SESSION['loggedInUser']);
    echo "<a href='../view/loginView.php'>Back</a>";

    ?>

</body>

</html>