<?php
require_once './dbconnection.php';
require_once './admin_menu.php';
$error = $message = "";
if (isset($_POST['update'])) {
    $cId = sanitizeString($_POST['cId']);
    $cName = sanitizeString($_POST['cName']);
    $cDescription = sanitizeString($_POST['cDescription']);
    $coImage = "";
    $extension = "";
    if (isset($_FILES['coImage']) && $_FILES['coImage']['size'] != 0) {
        $temp_name = $_FILES['coImage']['tmp_name'];
        $name = $_FILES['coImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $coImage = "$cName.$extension";
        $destination = "./images/Course/$coImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    $cPrice = sanitizeString($_POST['cPrice']);
    $coach = sanitizeString($_POST['coach']);
    $query = "INSERT INTO course values (null, '$cName', '$cDescription', '$coImage', '$cPrice', '$coach')";
    $query = "UPDATE Course SET cName = '$cName', cDescription='$cDescription', cImage = '$coImage', cPrice='$cPrice', coach='$coach' WHERE cId = '$cId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Add class error, please try again";
    } else {
        $message = "Add class successfully";
    }
}

if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    $query = "SELECT * FROM Course WHERE cId = '$cId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cId = $row[0];
        $cName = $row[1];
        $cDescription = $row[2];
        $cImage = $row[3];
        $cPrice = $row[4];
        $coach = $row[5];
    }
}
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Manage Course</span>
                <i class="fa fa-angle-right"></i>
                <span>Add Course</span>
            </h2>
        </div>
        <div class="banner">
            <form action = "update_course.php" method = "post" enctype="multipart/form-data">
                <fieldset class = "fitContent">
                    <legend>Add Course</legend>
                    <span class="error"><?php echo $error; ?></span><br>
                    <input type="hidden" name="cId" id="className"  required value="<?php echo $cId ?>" /><br>
                    Name<br>
                    <input type="text" name="cName" id="className" placeholder="(e.g., Yoga)" required value="<?php echo $cName ?>" /><br>
                    Description<br>
                    <textarea name="cDescription" id="classDescription" required><?php echo $cDescription ?></textarea><br>
                    Price<br>
                    <input type="number" name="cPrice" id="classPrice" value="<?php echo $cPrice ?>" required /><br>
                    Image<br>
                    <input type="file" name="coImage" value="" required/><br>
                    Coach<br>
                    <select name="coach">
                        <?php
                        $query = "SELECT uId, username FROM User WHERE status='2'";
                        $Users = queryMysql($query);
                        while ($User = mysqli_fetch_array($Users)) {
                            $caId = $User[0];
                            $caName = $User[1];
                            echo "<option value='$caId'>$caName</option>";
                        }
                        ?>
                    </select><br><br>

                    <input type="submit" value="Update" name="update" /><br>
                    <span class="success"><?php echo $message; ?></span><br>
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

