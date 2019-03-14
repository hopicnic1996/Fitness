<?php
session_start();
require_once './dbconnection.php';

if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    $query = "DELETE FROM Course WHERE cId = '$cId'";
    queryMysql($query);
    header("Location: view_course.php");
}
?>