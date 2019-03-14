<?php
require_once 'dbconnection.php';
require 'admin_menu.php';
xampp: error_reporting(0);
//getting the data
$error = $msg = "";
if (isset($_POST['add'])) { //adding
    $csName = sanitizeString($_POST['csName']);
    $csEmail = sanitizeString($_POST['csEmail']);
    $csPass = sanitizeString($_POST['csPass']);
    $csDoB = sanitizeString($_POST['csDoB']);
    $csPhone = sanitizeString($_POST['csPhone']);
    $csGender = sanitizeString($_POST['csGender']);
    $csAddress = sanitizeString($_POST['csAddress']);
    $csImage = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['csImage']) && $_FILES['csImage']['size'] != 0) {
        $temp_name = $_FILES['csImage']['tmp_name'];
        $name = $_FILES['csImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $csImage = "$csEmail.$extension";
        $destination = "./images/Customer/$csImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    //TODO: Do the PHP validation here to protect your server
    //Add the student
    $token = passwordToToken($csPass);
    $query = "INSERT INTO Customer(csName,csEmail,csPassword,csDoB,csPhone,csGender,csAddress,csImage)"." values ('$csName','$csEmail', '$token','$csDoB','$csPhone','$csGender','$csAddress','$csImage')";
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
                <span>Manage Customer</span>
                <i class="fa fa-angle-right"></i>
                <span>Add Customer</span>
            </h2>
        </div>
        <div class="banner">
            <form action="add_customer.php" method="POST" enctype="multipart/form-data">
                <fieldset class="banner">
                    <div class="error"><?php echo $error; ?></div>
                    <div class="success"><?php echo $msg; ?></div>
                    <legend>Add Customer</legend>
                    Name: <br>
                    <input type="text" name="csName" maxlength="50" required/><br>
                    Email:<br>
                    <input type="email" name="csEmail" maxlength="50"/><br>
                    Password: <br>
                    <input type="password" name="csPass" maxlength="50" required/><br>
                    Date of birth:<br>
                    <input type="date" name="csDoB"/><br>
                    Phone:<br>
                    <input type="number" name="csPhone" maxlength="15"/><br>
                    Gender:<br>
                    <input type="radio" name="csGender" value="M" checked/>Male
                    <input type="radio" name="csGender" value="F"/>Female<br>
                    Address:<br>
                    <textarea maxlength="200" name="csAddress"></textarea><br>
                    Image:<br>
                    <input type="file" name="csImage"/><br><br>
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

