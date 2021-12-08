<?php
header("Content-Type:application/json");

//imports
include '../../config/DatabaseLocationHunter.php';
include "../../GenerateRandom.php";
include '../../authentication/Signup.php';
include '../../Status.php';
include '../../StatusMessage.php';

if (!empty($_POST['userName']) && !empty($_POST['password'])) {

    //Initialize parameters
    $userName = htmlspecialchars(trim($_POST['userName']), ENT_QUOTES);
    $userName = filter_var($userName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $signup = new Signup($userName, $password);

    //functions
    $signup->signup();
} else {
    Status::isEmpty();
}
