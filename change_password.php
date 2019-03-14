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
    $csOldPass = sanitizeString($_POST['csOldPass']);
    $csPass = sanitizeString($_POST['csPass']);
    $token_check = passwordToToken($csOldPass);
    $query_check = "SELECT * FROM Customer WHERE csId = '$csId' AND csPassword = '$token_check'";
    $result_check = queryMysql($query_check);
    if ($result_check->num_rows == 0) {
        $error = "Wrong password";
    } else {
        $token = passwordToToken($csPass);
        $query = "UPDATE Customer SET csPassword = '$token' WHERE csId = '$csId'";
        $result = queryMysql($query);
        $msg = "Change password success";
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
                <span>Change password</span>
            </h2>
        </div>
        <div class="banner">
            <form action="change_password.php" method="POST" enctype="multipart/form-data">
                <fieldset class="banner">
                    <div class="error"><?php echo $error; ?></div>
                    <div class="success"><?php echo $msg; ?></div>
                    <legend>Add Customer</legend>
                    <input type="hidden" name="csId" maxlength="50" required value="<?php echo $csId; ?>"/>
                    Old password: <br>
                    <input type="password" name="csOldPass" maxlength="50" required /><br>
                    New password: <br>
                    <input type="password" name="csPass" maxlength="50" required /><br>

                    <input type="submit" value="Change" name="update"/>
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

