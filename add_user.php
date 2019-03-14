<?php
require_once 'dbconnection.php';
require 'admin_menu.php';
xampp: error_reporting(0);
//getting the data
$error = $msg = "";
if (isset($_POST['add'])) { //adding
    $username = sanitizeString($_POST['Name']);
    $password = sanitizeString($_POST['Pass']);
    $email = sanitizeString($_POST['Email']);
    $image = sanitizeString($_POST['Image']);
    $status = sanitizeString($_POST['status']);
    $image = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['Image']) && $_FILES['Image']['size'] != 0) {
        $temp_name = $_FILES['Image']['tmp_name'];
        $name = $_FILES['Image']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $image = "$email.$extension";
        $destination = "./images/User/$image";
        move_uploaded_file($temp_name, $destination);
    }
    $token = passwordToToken($password);
    $query = "INSERT INTO User(username, password, email, image, status) VALUES ('$username', '$token', '$email', '$image', '$status')";
    $result = queryMySql($query);
    if (!$result) {
        $error = $error . "<br>Can't add student, please try again";
    } else {
        $msg = "Added $sName successfully!";
    }
}
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Manage user</span>
                <i class="fa fa-angle-right"></i>
                <span>Add Coach</span>
            </h2>
        </div>
        <div class="banner">
            <form action="add_user.php" method="POST" enctype="multipart/form-data">
                <fieldset class="banner">
                    <div class="error"><?php echo $error; ?></div>
                    <div class="success"><?php echo $msg; ?></div>
                    <legend>Add Coach</legend>
                    Name: <br>
                    <input type="text" name="Name" maxlength="50" required/><br>
                    Email:<br>
                    <input type="email" name="Email" maxlength="50"/><br>
                    Password: <br>
                    <input type="password" name="Pass" maxlength="50" required/><br>
                   
                    <input type="hidden" name="status" value="2" /><br>
                    Image:<br>
                    <input type="file" name="Image"/><br>
                    
                    <input type="submit" value="Add" name="add"/>
                </fieldset>
            </form>
        </div>
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> | Edit by Trung - GCH15332 </p>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>


</body>
</html>

