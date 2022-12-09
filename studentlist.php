<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student List - MGMS</title>
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
            <h1 class="mt-4">Student List</h1>





            <div class=" vertical-left">
                <div class="container" style="text-align: left;">





                    <?php
                    $students = $db->getAllStudents();
                    $assessments = $db->getAllAssessment();

                    ?>

                    <div class="hello" id="accordionExample">
                        <?php for ($i = 0; $i < count($students); $i++) {
                            $dataPoints = array();
                            $weightAvg = array();
                            foreach ($assessments as $a) {

                                $avg = $db->getAverageByAssessmentId($a['id']);
                                $numberOfQuestions = $db->getNumberOfQuestions($a['id']);
                                $questions = $db->getAllQuestionsByAssessmentIdAndUserId($students[$i]['id'], $a['id']);
                                $sum = 0;
                                for ($j = 1; $j <= $numberOfQuestions[0]; $j++) {
                                    if (array_search($j, array_column($questions, 'questionNumber')) !== false) {

                                        $sum +=  $questions[$j - 1]['grade'];
                                    }
                                }
                                $personalAvg = $sum / $numberOfQuestions[0];
                                $weight = $a['weight'];

                                array_push($weightAvg, $personalAvg * ($weight / 100));
                                array_push($dataPoints, array("y" => $personalAvg, "label" => $a['name']));
                            }

                            $weightAvg = array_filter($weightAvg);
                            $globalAvg = array_sum($weightAvg);

                        ?>




                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                    <button class="accordion-button <?php echo ($i > 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                        <?php echo $students[$i]['firstName'] . " " . $students[$i]['lastName'] ?>

                                    </button>
                                </h2>
                                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Overall Average: <?php echo "<strong>$globalAvg %</strong>"; ?>









                                        </p>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
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
                        }
                    </script>
                </div>
            </div>


    </main>


    <?php include 'view/footer.php' ?>

</html>