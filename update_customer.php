<?php
require_once 'dbconnection.php';
if (!isset($_SESSION['username'])) {
    include_once './customer_menu.php';
} else {
    include_once 'admin_menu.php';
}
xampp: error_reporting(0);
//getting the data
$error = $msg = "";
if (isset($_POST['update'])) { //adding
    $csId = sanitizeString($_POST['csId']);
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
    $query = "UPDATE Customer SET csName = '$csName', csEmail = '$csEmail', csDoB = '$csDoB', csPhone = '$csPhone', csGender = '$csGender', csAddress = '$csAddress', csImage = '$csImage' WHERE csId = '$csId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = $error . "<br>Update fail, please try again";
    } else {
//        $msg = "Update $csName successfully!";
        header("Refresh:0; url=view_customer.php");
    }
}

if (isset($_POST['csId'])) {
    $csId = sanitizeString($_POST['csId']);
    $query = "SELECT csId, csName,csEmail,csDoB,csPhone,csGender,csAddress,csImage FROM Customer WHERE csId = '$csId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $csId = $row[0];
        $csName = $row[1];
        $csEmail = $row[2];
        $csDob = $row[3];
        $csPhone = $row[4];
        $csGender = $row[5];
        $csAddress = $row[6];
        $csImage = $row[7];
    }
}
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Customer management</span>
                <i class="fa fa-angle-right"></i>
                <span>Add Customer</span>
            </h2>
        </div>
        <div class="banner">
            <form action="update_customer.php" method="POST" enctype="multipart/form-data">
                <fieldset class="banner">
                    <div class="error"><?php echo $error; ?></div>
                    <div class="success"><?php echo $msg; ?></div>
                    <legend>Add Customer</legend>
                    <input type="hidden" name="csId" maxlength="50" required value="<?php echo $csId; ?>"/>
                    Name: <br>
                    <input type="text" name="csName" maxlength="50" required value="<?php echo $csName; ?>"/><br>
                    Email:<br>
                    <input type="email" name="csEmail" maxlength="50" required value="<?php echo $csEmail; ?>"/><br>
                    Date of birth:<br>
                    <input type="date" name="csDoB" required value="<?php echo $csDob; ?>"/><br>
                    Phone:<br>
                    <input type="number" name="csPhone" maxlength="15" required value="<?php echo $csPhone; ?>"/><br>
                    Gender:<br>
                    <?php if ($csGender == M) { ?>
                        <input type="radio" name="csGender" value="M" checked/>Male
                    <?php } else { ?>
                        <input type="radio" name="csGender" value="M" />Male
                    <?php } ?>
                    <?php if ($csGender == F) { ?>
                        <input type="radio" name="csGender" value="F" checked/>Female<br>
                    <?php } else { ?>
                        <input type="radio" name="csGender" value="F" />Female<br>
                    <?php } ?>
                    Address:<br>
                    <textarea maxlength="200" name="csAddress" ><?php echo $csAddress; ?></textarea><br>
                    Image:<br>
                    <?php if($csImage){ ?>
                    <img src='./images/Customer/<?php echo $csImage; ?>' height='150'>
                    <?php }else{ ?>
                    <img src='' height='150'>
                    <?php } ?>
                    <input type="file" name="csImage" value="./images/Customer/<?php echo $csImage; ?>" ><br>
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

