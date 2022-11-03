<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

if (isset($_POST['Register'])) {

    if (strlen($_POST['username']) < 2 || strlen($_POST['username']) > 20) {
        $_SESSION['Error'] = 'Username must be between 2-20 characters';
        header("Location: ../view/registerUserView.php");
        return;
    }

    if (strlen($_POST['password']) < 2 || strlen($_POST['password']) > 20) {
        $_SESSION['Error'] = 'Password must be between 2-20 characters';
        header("Location: ../view/registerUserView.php");
        return;
    }

    if ($_POST['password'] != $_POST['confirmPassword']) {
        $_SESSION['Error'] = 'Passwords do not match';
        header("Location: ../view/registerUserView.php");
        return;
    }

    if (strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 20) {
        $_SESSION['Error'] = 'First name must be between 2-20 characters';
        header("Location: ../view/registerUserView.php");
        return;
    }

    if (strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 20) {
        $_SESSION['Error'] = 'Last name must be between 2-20 characters';
        header("Location: ../view/registerUserView.php");
        return;
    }

    $array['id'] = 0;
    $array['accessLevel'] = 0;
    $array['username'] = $_POST['username'];
    $array['password'] = $_POST['password'];
    $array['firstName'] = $_POST['firstName'];
    $array['lastName'] = $_POST['lastName'];

    $user = new user($array);

    $query = $db->registerUser($user);

    if ($query == true) {
        header("Location: ../View/registerUserView.php?success");
    } elseif ($query == false) {
        $_SESSION['Error'] = 'Username not available!';
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['confirmPassword'] = $_POST['confirmPassword'];
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        header("Location: ../view/registerUserView.php");
    }
}
