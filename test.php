<!-- JUST TO QUICKLY CREATE DB ENTRIES AND TEST SQL QUERIES -->
<!-- DELETE BEFORE DEPLOYMENT -->

<?php
spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Create Stuff</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
    <div class="vertical-center">
        <div class="container" style="text-align: center;">

            <h2>Create Teacher</h1>
                <form method="POST" action="test.php">
                    <label for="username">Username:</label>
                    <input type="text" name="teacherUsername">

                    <label for="password">Password:</label>
                    <input type="text" name="teacherPassword">

                    <input type="submit" name="createTeacher" id="createTeacher">
                </form>

                <br>
                <a href="view/loginView.php" type="button" class="btn btn-primary">LogIn/Register</a>
                <br>
                <hr>
                <br>

                <h2>Create Assessment</h2>
                <form method="POST" action="test.php">
                    <label for="name">Name:</label>
                    <input type="text" name="assignmentName">

                    <label for="weight">Weight:</label>
                    <input type="number" name="assignmentWeight">

                    <label for="numberOfQuestions">Number Of Questions:</label>
                    <input type="number" name="numberOfQuestions">

                    <label for="weight">Due Date:</label>
                    <input type="date" name="assignmentDueDate">

                    <input type="submit" name="createAssignment" id="createAssignment">
                </form>

        </div>
    </div>
    <hr>

    <?php
    $assessments = $db->getAllAssessment();
    var_dump($assessments);

    $data = array();
    for ($j = 1; $j <= $assessments[9]['numberOfQuestions']; $j++) {
        $avg = $db->getQuestionAverage($assessments[9]['id'], $j);
        array_push($data, array("y" => $avg[0], "label" => $j));
    }
    ?>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- 1 -->
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>

    <!-- 2 -->
    <script>
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Animation test"
            },
            animationEnabled: true,
            data: [{
                type: "column",
                dataPoints: []
            }]
        });
        chart.options.data[0].dataPoints = <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>;
        chart.render();
    </script>

</body>

</html>

<?php

if (isset($_POST['createTeacher'])) {
    $array['id'] = 0;
    $array['accessLevel'] = 1;
    $array['username'] = $_POST['teacherUsername'];
    $array['password'] = $_POST['teacherPassword'];
    $array['firstName'] = $_POST['teacherUsername'];
    $array['lastName'] = $_POST['teacherUsername'];

    $user = new user($array);

    $userExists = $db->registerUser($user);

    if ($userExists == true) {
        echo "Teacher created";
    } else {
        echo "Teacher not created";
    }
}

if (isset($_POST['createAssignment'])) {
    $array['id'] = 0;
    $array['name'] = $_POST['assignmentName'];
    $array['weight'] = $_POST['assignmentWeight'];
    $array['numberOfQuestions'] = $_POST['numberOfQuestions'];
    $array['dueDate'] = $_POST['assignmentDueDate'];

    $assessment = new assessment($array);

    $assignmentExists = $db->createAssessment($assessment);

    if ($assignmentExists == true) {
        echo "Assessment created";
    } else {
        echo "Assessment not created";
    }
}

?>