<?php
header("Content-Type:application/json");

//imports
include '../../config/DatabaseLocationHunter.php';
include '../../authentication/CheckKey.php';
include '../../LocationUtil/Locations.php';
include '../../data/LocationData.php';
include '../../Status.php';
include '../../StatusMessage.php';

if (!empty($_POST['Key'])) {
    $key = htmlspecialchars($_POST["Key"], ENT_QUOTES);
    $key = filter_var($key, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    //Function
    $locations = new Locations($key);
    $locations->getLocations();
} else {
    Status::isEmpty();
}