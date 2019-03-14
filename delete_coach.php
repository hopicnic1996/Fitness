<?php
session_start();
require_once './dbconnection.php';

if (isset($_POST['uId'])) {
    $uId = sanitizeString($_POST['uId']);
    $query = "DELETE FROM User WHERE uId = '$uId'";
    queryMysql($query);
    header("Location: view_coach.php");
}
?>
