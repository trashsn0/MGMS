<?php

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

if (isset($_POST['save'])) {

    if (strlen($_POST['username']) < 2 || strlen($_POST['username']) > 20) {
        $_SESSION['Error'] = 'Username must be between 2-20 characters';
        header("Location: ../view/profileView.php");
        return;
    }

    if (strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 20) {
        $_SESSION['Error'] = 'First name must be between 2-20 characters';
        header("Location: ../view/profileView.php");
        return;
    }

    if (strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 20) {
        $_SESSION['Error'] = 'Last name must be between 2-20 characters';
        header("Location: ../view/profileView.php");
        return;
    }

    $array['id'] = $_SESSION['loggedInUser']['id'];
    $array['accessLevel'] = $_SESSION['loggedInUser']['accessLevel'];
    $array['username'] = $_POST['username'];
    $array['password'] = $_SESSION['loggedInUser']['password'];
    $array['firstName'] = $_POST['firstName'];
    $array['lastName'] = $_POST['lastName'];

    $user = new user($array);

    $query = $db->updateUser($user);

    if ($query == true) {
        $_SESSION['loggedInUser'] = $array;
        header("Location: ../View/profileView.php?success");
    } elseif ($query == false) {
        $_SESSION['Error'] = 'Username not available!';
        header("Location: ../view/profileView.php");
    }
}

if (isset($_POST['changePassword'])) {

    if (strlen($_POST['newPassword']) < 2 || strlen($_POST['newPassword']) > 20) {
        $_SESSION['passwordError'] = 'Password must be between 2-20 characters';
        header("Location: ../view/profileView.php");
        return;
    }

    if ($_POST['newPassword'] != $_POST['newPasswordConfirmation']) {
        $_SESSION['passwordError'] = 'Passwords do not match';
        header("Location: ../view/profileView.php");
        return;
    }

    if (!password_verify($_POST['oldPassword'], $_SESSION['loggedInUser']['password'])) {
        $_SESSION['passwordError'] = 'Incorrect Password';
        header("Location: ../view/profileView.php");
        return;
    }

    $query = $db->changePassword($_SESSION['loggedInUser']['id'], $_POST['newPassword']);

    if ($query) {
        header("Location: ../View/profileView.php?passwordChanged");
    }
}
