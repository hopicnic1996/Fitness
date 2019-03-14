<?php
require_once 'dbconnection.php';
require 'admin_menu.php';
xampp: error_reporting(0);
//getting the data
$error = $msg = "";
if (isset($_POST['update'])) { //adding
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
//    $query = "INSERT INTO User(username, password, email, image, status) VALUES ('$username', '$token', '$email', '$image', '$status')";
    $query = "UPDATE User SET username = '$username', email = '$email', image = '$image' WHERE uId = '$csId'";
    $result = queryMySql($query);
    if (!$result) {
        $error = $error . "<br>Update fail, please try again";
    } else {
        header("Refresh:0; url=view_coach.php");
    }
}

if (isset($_POST['uId'])) {
    $uId = sanitizeString($_POST['uId']);
    $query = "SELECT * FROM User WHERE uId='$uId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $uId = $row[0];
        $uName = $row[1];
        $uEmail = $row[3];
        $uImage = $row[4];
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
                <span>Add Admin/Coach</span>
            </h2>
        </div>
        <div class="banner">
            <form action="update_coach.php" method="POST" enctype="multipart/form-data">
                <fieldset class="banner">
                    <div class="error"><?php echo $error; ?></div>
                    <div class="success"><?php echo $msg; ?></div>
                    <legend>Add Customer</legend>
                    Name: <br>
                    <input type="text" name="Name" maxlength="50" value="<?php echo $uName; ?>" required/><br>
                    Email:<br>
                    <input type="email" name="Email" maxlength="50" value="<?php echo $uEmail; ?>"/><br>
                    Permission:<br>
                    <input type="radio" name="status" value="1" />Admin
                    <input type="radio" name="status" value="2" checked />Coach<br>
                    Image:<br>
                    <input type="file" name="Image"/><br>

                    <input type="submit" value="Update" name="update"/>
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

