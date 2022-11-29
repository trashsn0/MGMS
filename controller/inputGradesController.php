<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

if (isset($_POST['assignment'])) {
    $_SESSION['selectedAssignment'] = $_POST['assignment'];
    if (isset($_SESSION['selectedAssignment'])) {
        printTable();
    } else {
        echo "";
    }
    die;
}

if (isset($_POST['userId'])) {
    $_SESSION['selectedStudent'] = $_POST['userId'];
    if (isset($_SESSION['selectedStudent'])) {
        printTable();
    } else {
        echo "";
    }
    die;
}

if (isset($_POST['submitGrades'])) {
    echo "<h1>here</h1>";
    die;
}

function printTable()
{
    if (!isset($_SESSION['selectedAssignment']) || ($_SESSION['selectedAssignment'] == 'default')) {
        die;
    }
    if (!isset($_SESSION['selectedStudent']) || ($_SESSION['selectedStudent'] == 'default')) {
        die;
    }
    $db = new DBManager();
    $questions = $db->getAllQuestionsByUserIdAndAssessmentId($_SESSION['selectedStudent'], $_SESSION['selectedAssignment']);
    $numberOfQuestions = $db->getNumberOfQuestions($_SESSION['selectedAssignment']);

    echo "
    <script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>
    <script src='../js/inputGrades.js' type='text/javascript'></script>";

    echo "<form action='' id='inputGradesForm'>
    <table class='table table-striped'>
        <tr>
            <th scope='col'>Question Number</th>
            <th scope='col'>Grade</th>
        </tr>";

    for ($i = 1; $i <= $numberOfQuestions[0]; $i++) {

        // studentId, assignmentId, questionNumber
        $str =  $_SESSION['selectedStudent'] . "," . $_SESSION['selectedAssignment'] . "," . $i;

        echo "<tr>
                <th scope='row'>" . $i . "</th>";

        if (array_search($i, array_column($questions, 'questionNumber')) !== false) {
            echo "<th><input type='number' name='" . $str . "' min='0' max='100' value='" . $questions[$i - 1]['grade'] . "'></input></th>";
        } else {
            echo "<th><input type='number' name='" . $str . "' min='0' max='100' value='0'></input></th>";
        }
        echo "</tr>";
    }
    echo "<tr>
            <th scope='row' colspan='2'><input type='button' value='Submit' class='btn btn-block btn-success' style='width: 40%;' name='submitGrades' id='submitGrades'>
            </th>          
        </tr>";


    echo "</table>
    </form>";
}
