<?php

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


    echo "<p>Username: " . $_POST['username'] . "</p><br>";
    echo "<p>Password: " . $_POST['password'] . "</p><br>";
    echo "<p>Confirm Password: " . password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT) . "</p><br>";
    echo "<p>First Name: " . $_POST['firstName'] . "</p><br>";
    echo "<p>Last Name: " . $_POST['lastName'] . "</p><br>";

    echo "<a href='../view/registerUserView.php'>Back</a>";


    // ADD USER TO DB AFTER HERE
}
