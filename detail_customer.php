<?php
require_once './header.php';
require_once './dbconnection.php';
include_once './customer_menu.php';
if (isset($csId)) {
    $query = "SELECT * FROM customer WHERE csId = '$csId'";
    $csInfor = queryMysql($query);
    $row = mysqli_fetch_array($csInfor);
    if ($row) {
        $csId = $row[0];
        $csName = $row[1];
        $csEmail = $row[2];
        $csDob = $row[4];
        $csPhone = $row[5];
        $csGender = $row[6];
        $csAddress = $row[7];
        $csImage = $row[8];
    }
}
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Manage User</span>
                <i class="fa fa-angle-right"></i>
                <span>Profile</span>
            </h2>
        </div>
        <div class="banner">
            <fieldset class="banner">
                <legend>Profile</legend>
                <input type="hidden" name="csId" maxlength="50" value="<?php echo $csId; ?>"/>
                Name: <br>
                <input type="text" name="csName" maxlength="50" disabled value="<?php echo $csName; ?>"/><br>
                Email:<br>
                <input type="email" name="csEmail" maxlength="50" disabled value="<?php echo $csEmail; ?>"/><br>
                Date of birth:<br>
                <input type="date" name="csDoB" disabled value="<?php echo $csDob; ?>"/><br>
                Phone:<br>
                <input type="number" name="csPhone" maxlength="15" disabled value="<?php echo $csPhone; ?>"/><br>
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
                <textarea maxlength="200" name="csAddress" disabled ><?php echo $csAddress; ?></textarea><br>
                Image:<br>
                <?php if ($csImage) { ?>
                    <img src='./images/Customer/<?php echo $csImage; ?>' height='150'>
                <?php } else { ?>
                    <img src='' height='150'><br>
                <?php } ?>
                <form class="frminline" action="update_customer.php" method="post">
                    <input type="hidden" name="csId" value="<?php echo $csId ?>" />
                    <input type="submit" value="Edit"/>
                </form>
            </fieldset>
        </div>
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> | Edit by Trung - GCH15332 </p>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>

