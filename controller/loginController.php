<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

if (isset($_POST['Login'])) {

    if (!empty($_POST['username'])  && !empty($_POST['password'])) {

        $query = $db->Login($_POST['username'], $_POST['password']);
        $_SESSION['loggedInUser'] = $query;

        if (!empty($query)) {
            header("Location: ../View/dashboardView.php");
        } else {
            //Displays "Invalid Credentials Error On Login Page"
            header("Location: ../View/loginView.php?error");
        }
    } else {
        //Displays "Invalid Credentials Error On Login Page"
        header("Location: ../View/loginView.php?error");
    }
}
