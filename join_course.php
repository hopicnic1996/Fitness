<?php
require_once './dbconnection.php';
require_once './header.php';
if (isset($_POST['cId'])) {
    $orDate = date("Y-m-d");
    $orStatus = '1';
    $cId = sanitizeString($_POST['cId']);
    $query = "INSERT INTO cOrder(orDate, csId, cId, orStatus) values('$orDate','$csId','$cId', '$orStatus')";
    $result = queryMysql($query);
    header("Refresh:0; url=view_course.php");
    }