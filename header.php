<?php

session_start();
xampp: error_reporting(0);
if (isset($_SESSION['username'])) {
    $uId = $_SESSION['uId'];
    $usern = $_SESSION['username'];
    $uImage = $_SESSION['uImage'];
    $userm = "$usern";
}
if (isset($_SESSION['cusname'])) {
    $csId = $_SESSION['csId'];
    $csImage = $_SESSION['csImage'];
    $usern = $_SESSION['cusname'];
    $userm = "$usern";
}
//include_once './menu.php';
