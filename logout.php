<?php
//require_once './index.php';
//session_unset();
//session_destroy();
//header("location: index.php");
//header("Refresh:0; url=index.php");
require_once './dbconnection.php';
destroySession();
header("Location: index.php");
die("You've logged out, <a href='index.php'>click here</a> to continue!");
?>