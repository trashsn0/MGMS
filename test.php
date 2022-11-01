<?php
spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
session_start();

$array['id'] = 0;
$array['accessLevel'] = 0;
$array['username'] = 'taest';
$array['password'] = 'test';
$array['firstName'] = 'test';
$array['lastName'] = 'test';

$user = new user($array);

$exists = $db->registerUser($user);

var_dump($exists);


if ($exists) {
    // user exists already.
} else {
    // user doesn't exist already, you can savely insert him.
}

// var_dump($query);

// if ($query == true) {
//     header("Location: ../View/registerUserView.php?success");
// } elseif ($query == false) {
//     header("Location: ../View/registerUserView.php?error");
// }
