<?php
session_start();
require_once './dbconnection.php';

if (isset($_POST['csId'])) {
    $csId = sanitizeString($_POST['csId']);
    $query = "DELETE FROM Customer WHERE csId = '$csId'";
    queryMysql($query);
    header("Location: view_customer.php");
//    die("You've deleted the student '$sId' <a href='loadstudent.php'>click here</a> to continue.");
}

if (isset($_POST['uId'])) {
    $uId = sanitizeString($_POST['uId']);
    $query = "DELETE FROM User WHERE uId = '$uId'";
    queryMysql($query);
    header("Location: view_coach.php");
//    die("You've deleted the student '$sId' <a href='loadstudent.php'>click here</a> to continue.");
}
?>