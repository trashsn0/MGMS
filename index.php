<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Index - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>


<?php include 'view/header.php';


spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});
if (isset($_SESSION['loggedInUser'])) {

    $db = new DBManager();
    $assessments = $db->getAllAssessment();
    $totalStudents = count($db->getAllStudents());
    $totalTeacher = count($db->getAllTeachers());
    $dataPoints = array();
    $dataPoints2 = array();
    $weightAvg = array();

    foreach ($assessments as $i) {
        $avg = $db->getAverageByAssessmentId($i['id']);
        $numberOfQuestions = $db->getNumberOfQuestions($i['id']);
        $questions = $db->getAllQuestionsByAssessmentIdAndUserId($_SESSION['loggedInUser']['id'], $i['id']);
        $sum = 0;
        for ($j = 1; $j <= $numberOfQuestions[0]; $j++) {
            if (array_search($j, array_column($questions, 'questionNumber')) !== false) {

                $sum +=  $questions[$j - 1]['grade'];
            }
        }
        $personalAvg = $sum / $numberOfQuestions[0];
        $weight = $i['weight'];


        if ($_SESSION['loggedInUser']['accessLevel'] == 0) {
            array_push($weightAvg, $personalAvg * ($weight / 100));
            array_push($dataPoints, array("y" => $personalAvg, "label" => $i['name']));
            array_push($dataPoints2, array("y" => $weight, "label" => $i['name']));
        } elseif ($_SESSION['loggedInUser']['accessLevel'] == 1) {
            array_push($dataPoints, array("y" => $avg[0], "label" => $i['name']));
            array_push($dataPoints2, array("y" => $weight, "label" => $i['name']));
        }
    }
}


?>

<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">


            </br>
            <header style="display:block; color: #fff;
                        background: #6c757d;
                        padding:20px;
                        
                        top: 100px;
                        border-radius: 25px;">

                <div class="container px-4 text-center">
                    <h1 class="fw-bolder">Welcome to MGMS</h1>
                    <p class="lead">A functional grade management system for Student/Professor in SOEN 287 Class</br></br>

                        <?php if (!isset($_SESSION['loggedInUser'])) {

                            echo "Please login/register to view assessments and grades";
                        } else {
                            $fullname = $_SESSION['loggedInUser']['firstName'] . ' ' . $_SESSION['loggedInUser']['lastName'];
                            echo "You are currently connected as <strong>$fullname</strong>";
                            if ($_SESSION['loggedInUser']['accessLevel'] == 0) {
                                $weightAvg = array_filter($weightAvg);
                                $globalAvg = array_sum($weightAvg);
                                echo "</br>Your total average is : <strong>$globalAvg%</strong>";
                            }

                            if ($_SESSION['loggedInUser']['accessLevel'] == 1) {
                                echo "</br>Number of students enrolled : <strong>$totalStudents</strong>";
                                echo "</br>Number of teachers : <strong>$totalTeacher</strong>";
                            }
                        }


                        ?>
                    </p>


                    <script type="text/javascript">
                        window.onload = function() {
                            // Average per Assessment
                            var chart = new CanvasJS.Chart("avgPerAssessment", {
                                animationEnabled: true,
                                theme: "light2",

                                axisY: {
                                    title: "Grade",
                                    suffix: "%",
                                    minimum: 0,
                                    maximum: 100
                                },
                                data: [{
                                    type: "column",
                                    yValueFormatString: "###",
                                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();

                            // Average per Assessment
                            var chart2 = new CanvasJS.Chart("assessments", {
                                animationEnabled: true,
                                theme: "light2",
                                axisY: {
                                    title: "Weight",
                                    suffix: "%",
                                    minimum: 0,
                                    maximum: 100
                                },
                                data: [{
                                    type: "pie",
                                    yValueFormatString: "###",
                                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                                }]

                            });
                            chart2.render();
                        }
                    </script>



                </div>

        </div>
        </br>
        <?php if (isset($_SESSION['loggedInUser'])) : ?>
            <div class="container px-4">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Stats (<?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) {
                                            echo "Your Grade in %";
                                        } else {
                                            echo "Class Avg in %";
                                        } ?> )
                            </div>
                            <div class="card-body">
                                <div id="avgPerAssessment" style="height: 200px; width: 100%;"></div>
                            </div>
                            <div class="card-footer small text-muted">Updated now</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Assessments (Weight in %)
                            </div>
                            <div class="card-body">
                                <div id="assessments" style="height: 200px; width: 100%;"></div>
                                <div class="card-footer small text-muted">Updated now</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


    </main>

    <?php include 'view/footer.php' ?>

</html>