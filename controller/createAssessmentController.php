<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

$currentDate = date("Y-m-d");

if (isset($_POST['createAssessment'])) {

    unset($_SESSION['Error']);

    if (strlen($_POST['name']) < 2 || strlen($_POST['name']) > 20) {
        $_SESSION['Error'] = 'Name must be between 2-20 characters';
        header("Location: ../add.php");
        return;
    }

    if (strlen($_POST['weight']) <= 0 || strlen($_POST['weight']) > 100) {
        $_SESSION['Error'] = 'Weight must be between 0-100';
        header("Location: ../add.php");
        return;
    }

    if (strlen($_POST['numberOfQuestions']) <= 0) {
        $_SESSION['Error'] = 'Number of questions must be rgeater than 0';
        header("Location: ../add.php");
        return;
    }

    


    $array['id'] = 0;
    $array['name'] = $_POST['name'];
    $array['weight'] = $_POST['weight'];
    $array['numberOfQuestions'] = $_POST['numberOfQuestions'];
    $array['dueDate'] = $_POST['dueDate'];

    $assessment = new assessment($array);

    $assignmentExists = $db->createAssessment($assessment);

    if ($assignmentExists == true) {
        header("Location: ../add.php?success");
    } elseif ($assignmentExists == false) {
        $_SESSION['Error'] = 'Assessment name already exists!';
        header("Location: ../add.php");
    }
}
