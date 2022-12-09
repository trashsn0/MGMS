<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Assesments - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .collapsible {
            display: block;
            text-transform: uppercase;
            text-align: center;
            padding: 1rem;
            color: #fff;
            background: #343a40;
            cursor: pointer;
            border-radius: 7px;
            transition: all 0.25s ease-out;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
        }

        .collapsible:hover .arrow {
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);

        }

        .collapsible:active .arrow.left {
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);

        }

        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #f1f1f1;
        }

        .arrow {
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 6px;
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transition: transform .2s ease-in-out;
        }



        .down {
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 6px;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transition: transform .2s ease-in-out;
        }
    </style>
</head>


<?php
include 'view/header.php';
spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
?>

<body>


    <div id="layoutSidenav_content">


        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">My Assesments</h1>


                <?php if ($_SESSION['loggedInUser']['accessLevel'] == 0) : ?>

                    <?php
                    $assessments = $db->getAllAssessment();
                    ?>

                    <?php for ($i = 0; $i < count($assessments); $i++) { ?>
                        <div class="vertical-center">
                            <button class="collapsible">
                                <table>
                                    <?php
                                    $numberOfQuestions = $db->getNumberOfQuestions($assessments[$i]['id']);
                                    $questions = $db->getAllQuestionsByAssessmentIdAndUserId($_SESSION['loggedInUser']['id'], $assessments[$i]['id']);
                                    ?>
                                    <?php
                                    $sum = 0;
                                    for ($j = 1; $j <= $numberOfQuestions[0]; $j++) {
                                    ?>

                                        <?php
                                        if (array_search($j, array_column($questions, 'questionNumber')) !== false) {

                                            $sum +=  $questions[$j - 1]['grade'];
                                        } else {;
                                        }
                                        ?>

                                    <?php
                                    }
                                    $avg = $sum / $numberOfQuestions[0];
                                    ?>

                                    <tr style="width: 2500px;">
                                        <th style="width: 2000px; text-align:left; padding-left: 25px;"><?php echo $assessments[$i]['name'] ?></th>
                                        <th style="width: 1200px; text-align:left; padding-left: 25px;"><?php echo "Due: " . $assessments[$i]['dueDate']; ?></th>
                                        <th style="width: 1200px; text-align: center;"><?php echo "Weight: " . $assessments[$i]['weight'] . "%"; ?></th>
                                        <th style="width: 1200px; text-align: center;"><?php echo number_format((float)$avg, 2, '.', '') . "%"; ?></th>

                                        <th class="arrow"></th>
                                    </tr>
                                </table>
                            </button>





                            <div class="content">
                                <?php
                                $numberOfQuestions = $db->getNumberOfQuestions($assessments[$i]['id']);
                                $questions = $db->getAllQuestionsByAssessmentIdAndUserId($_SESSION['loggedInUser']['id'], $assessments[$i]['id']);
                                ?>
                                <table class="table">
                                    <tr>
                                        <th scope="col">Question Number</th>
                                        <th scope="col">Grade</th>
                                    </tr>

                                    <?php
                                    $sum = 0;
                                    for ($j = 1; $j <= $numberOfQuestions[0]; $j++) {
                                    ?>
                                        <tr>
                                            <th><?php echo $j; ?></th>
                                            <?php
                                            if (array_search($j, array_column($questions, 'questionNumber')) !== false) {
                                                echo "<th scope='row'>" . $questions[$j - 1]['grade'] . "</th>";
                                                $sum +=  $questions[$j - 1]['grade'];
                                            } else {
                                                echo "<th scope='row'>N/A</th>";
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    $avg = $sum / $numberOfQuestions[0];
                                    ?>
                                    <tr>
                                        <th scope="col">Total</th>
                                        <th scope="col"><?php echo number_format((float)$avg, 2, '.', '') . "%"; ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                <?php }
                endif; ?>




                <script>
                    var coll = document.getElementsByClassName("collapsible", );
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        });
                    }
                </script>
                </hr>

            </div>
        </main>
        <?php include 'view/footer.php' ?>
    </div>


</body>

</html>