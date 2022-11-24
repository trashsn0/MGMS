<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

if (isset($_POST['assignment'])) {
    echo $_POST['assignment'];
    die;
}

if (isset($_POST['userId'])) {

    // $questions = $db->getAllQuestionsByUserIdAndAssessmentId($_SESSION['loggedInUser']['id'], $_POST['assignment']);
    $numberOfQuestions = $db->getNumberOfQuestions($_POST['assignment']);
    $questions = $db->getAllQuestionsByUserIdAndAssessmentId(1, 1);
    echo implode(",", $questions[1]);

    echo "<table>
        <tr>
        <th>Question Number</th>
        <th>Grade</th>
        </tr>";

    for ($i = 0; $i < $numberOfQuestions; $i++) {

        echo "<tr>";
        echo "<th>" . $i . "</th>";
        echo "<th></th>";
        echo "</tr>";
    }


    echo "</table>";
    // echo $_POST['userId'];
    // die;
}
