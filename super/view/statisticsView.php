<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
$assessments = $db->getAllAssessment();
$dataPoints = array();

foreach ($assessments as $i) {
    $avg = $db->getAverageByAssessmentId($i['id']);
    array_push($dataPoints, array("y" => $avg[0], "label" => $i['name']));
}

?>



<!DOCTYPE html>
<html>

<head>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<script type="text/javascript">
    window.onload = function() {
        // Average per Assessment
        var chart = new CanvasJS.Chart("avgPerAssessment", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Average per Assessment"
            },
            axisY: {
                title: "Average Grade",
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

<body>
    <div class="container" style="text-align: center; margin-top: 5%;">

        <div id="avgPerAssessment" style="height: 370px; width: 100%;"></div>

        <br>
        <hr>
        <br>

        <div class="accordion" id="accordionExample">
            <?php for ($i = 0; $i < count($assessments); $i++) { ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                        <button class="accordion-button <?php echo ($i > 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                            <?php echo $assessments[$i]['name']; ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : 'show'; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php
                            $data = array();
                            for ($j = 1; $j <= $assessments[$i]['numberOfQuestions']; $j++) {
                                $avg = $db->getQuestionAverage($assessments[$i]['id'], $j);
                                array_push($data, array("y" => $avg[0], "label" => $j));
                            }
                            ?>
                            <div id="<?php echo $assessments[$i]['name']; ?>" style="height: 370px; width: 100%;"></div>

                            <script type="text/javascript">
                                var chart2 = new CanvasJS.Chart("<?php echo $assessments[$i]['name']; ?>", {
                                    animationEnabled: true,
                                    theme: "light2",
                                    title: {
                                        text: "Average per Question"
                                    },
                                    axisY: {
                                        title: "Average Grade",
                                        suffix: "%",
                                        minimum: 0,
                                        maximum: 100
                                    },
                                    axisX: {
                                        interval: 1
                                    },
                                    data: [{
                                        type: "column",
                                        yValueFormatString: "###",
                                        dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart2.render();
                                <?php
                                if ($i == 0) {
                                } else {
                                ?>
                                    document.getElementById("collapse<?php echo $i; ?>").classList.remove("show");
                                <?php
                                }
                                ?>
                            </script>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</body>

</html>