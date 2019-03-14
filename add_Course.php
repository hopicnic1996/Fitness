<?php
require_once './dbconnection.php';
require_once './admin_menu.php';
$error = $message = "";
if (isset($_POST['add'])) {
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
    $result = queryMysql($query);
    if (!$result) {
        $error = "Add course error, please try again";
    } else {
        $message = "Add course successfully";
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
            <form action = "add_Course.php" method = "post" enctype="multipart/form-data">
                <fieldset class = "fitContent">
                    <legend>Add Course</legend>
                    <span class="error"><?php echo $error; ?></span><br>
                    Name<br>
                    <input type="text" name="cName" id="className" placeholder="(e.g., Yoga)" required /><br>
                    Description<br>
                    <textarea name="cDescription" id="classDescription" required></textarea><br>
                    Price<br>
                    <input type="number" name="cPrice" id="classPrice" required /><br>
                    Image<br>
                    <input type="file" name="coImage" required/><br>
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

                    <input type="submit" value="Add" name="add" /><br>
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

