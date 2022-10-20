<?php

session_start();

if (isset($_POST['Login'])) {

    if (!empty($_POST['username'])  && !empty($_POST['password'])) {

        // LOGIN QUERY TO DB HERE
        // IF SUCCECESSFUL LOGIN, CREATE USER OBJ

        if (true /* CHECK IF LOGIN QUERY RETURNED USER OBJECT */) {
            //SET USER INFO TO SESSION

            echo "<p>Username: " . $_POST['username'] . "</p><br>";
            echo "<p>Password: " . $_POST['password'] . "</p><br>";

            echo "<a href='../view/loginview.php'>Back</a>";

            // SEND TO CORRECT PAGE
            // header("Location: "); 
        } else {
            //Displays "Invalid Credentials Error On Login Page"
            header("Location: ../View/loginView.php?error");
        }
    } else {
        //Displays "Invalid Credentials Error On Login Page"
        header("Location: ../View/loginView.php?error");
    }
}
