<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
?>

<!DOCTYPE html>
<html>

<head>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br><br><br>

    <!-- Show Teacher Options -->
    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 1) : ?>
        <div class=" vertical-center">
            <div class="container" style="text-align: center;">

                <?php
                $assessments = $db->getAllAssessment();
                ?>

                <div class="accordion" id="accordionExample">
                    <?php for ($i = 0; $i < count($assessments); $i++) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                <button class="accordion-button <?php echo ($i > 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo $assessments[$i]['name']; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Number of questions: <?php echo $assessments[$i]['numberOfQuestions']; ?></p>
                                    <p>Weight: <?php echo $assessments[$i]['weight']; ?></p>
                                    <p>Due Date: <?php echo $assessments[$i]['dueDate']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <!-- END OF TEACHER -->

    <!-- Show Student Options -->
    <?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) : ?>

        <?php
        $assessments = $db->getAllAssessment();
        ?>

        <!-- Style this later -->
        <div class="vertical-center">
            <div class="container" style="text-align: center;">

                <div class="accordion" id="accordionExample">
                    <?php for ($i = 0; $i < count($assessments); $i++) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                <button class="accordion-button <?php echo ($i > 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo $assessments[$i]['name'] . " - Due: " . $assessments[$i]['dueDate']; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php
                                    $numberOfQuestions = $db->getNumberOfQuestions($i + 1);
                                    $questions = $db->getAllQuestionsByAssessmentIdAndUserId($_SESSION['loggedInUser']['id'], $i + 1);
                                    ?>

                                    <table class="table">
                                        <tr>
                                            <th scope="col">Question Number</th>
                                            <th scope="col">Grade</th>
                                        </tr>

                                        <?php
                                        for ($j = 1; $j <= $numberOfQuestions[0]; $j++) {
                                        ?>
                                            <tr>
                                                <th><?php echo $j; ?></th>
                                                <?php
                                                if (array_search($j, array_column($questions, 'questionNumber')) !== false) {
                                                    echo "<th scope='row'>" . $questions[$j - 1]['grade'] . "</th>";
                                                } else {
                                                    echo "<th scope='row'>N/A</th>";
                                                }
                                                ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

</body>

</html>