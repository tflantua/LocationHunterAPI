<?php
header("Content-Type:application/json");

//imports
include '../../config/DatabaseLocationHunter.php';
include '../../authentication/Login.php';
include '../../Status.php';
include '../../StatusMessage.php';

if (!empty($_POST['userName']) && !empty($_POST['password'])) {
    $userName = htmlspecialchars($_POST["userName"], ENT_QUOTES);
    $userName = filter_var($userName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    //Function
    $login = new Login($userName, $password);
    $login->logIn();
} else {
    $status = new Status();
    $status->isEmpty();
}
