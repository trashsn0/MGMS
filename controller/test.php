<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
session_start();

$array['id'] = 0;
$array['accessLevel'] = 0;
$array['username'] = "chris";
$array['password'] = "chris";
$array['firstName'] = "chris";
$array['lastName'] = "chris";

$user = new user($array);

// $query = $db->registerUser($user);

$query = $db->login("chris", 'chris');
$_SESSION['loggedInUser'] = $query;

var_dump($query);

var_dump($_SESSION['loggedInUser']);
