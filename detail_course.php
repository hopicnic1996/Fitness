<?php
require_once './dbconnection.php';
require_once './header.php';
if (!isset($_SESSION['username'])) {
    include_once './customer_menu.php';
} else {
    include_once 'admin_menu.php';
}
if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    $query = "SELECT * FROM Customer WHERE csClass = '$cId'";
    $query1 = "SELECT * FROM Course WHERE cId = '$cId'";
    $customerList = queryMysql($query);
    $courseName = queryMysql($query1);
    $row1 = mysqli_fetch_array($courseName);
    $cName = $row1[1];
    $cDescription = $row1[2];
}
?>
<style>
    /*style for the table */
    .tbl{
        background-color: darkgray;
    }
    .tbl tr:nth-child(odd){
        background-color: #f6f6f6;
    }
    .tbl tr:nth-child(even){
        background-color: bisque;
    }
    .tbl tr td, th{
        padding: 5px;
    }
    .frminline{
        display: inline;
    }
</style>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <div class="banner">
            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Manage Course</span>
                <i class="fa fa-angle-right"></i>
                <span>View courses</span>
                <i class="fa fa-angle-right"></i>
                <span><?php echo $cName; ?></span>
            </h2>
        </div>

        <div class="banner">
            <section class="blog py-5">
                <div class="container py-md-3">
                    <h4 class="heading"><?php echo $cName; ?></h4>
                    <div class="row blog-grids head">
                        <div class="col-lg-7 mb-lg-5 blog-img1">
                            <p class="my-3"><?php echo $cDescription ?></p>
                        </div>


                    </div>
                </div>
            </section>
            <fieldset class="banner" >
                <!--table here-->
                <table class="tbl">
                    <h3>Customer in this course</h3>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DoB</th>
                        <th>Phone</th>
                        <th>Gender</th>   
                        <th>Address</th>
                        <th>Option</th>
                        <!--<th>Option</th>-->
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($customerList)) {
                        $csId = $row[0];
                        $csName = $row[1];
                        $csEmail = $row[2];
                        $csDob = $row[4];
                        $csPhone = $row[5];
                        $csGender = $row[6];
                        $csAddress = $row[7];
                        $csImage = $row[8];

                        echo "<tr>";
                        echo "<td>$csId</td>";
                        if ($csImage == null) {
                            echo "<td ><img src='./images/User/default.jpg' width = '80' height='100'></td> ";
                        } else {
                            echo "<td ><img src='./images/User/" . $csImage . "' width = '80' height='100'></td> ";
                        }
                        echo "<td>$csName</td>";
                        echo "<td>$csEmail</td>";
                        echo "<td>$csDob</td>";
                        echo "<td>$csPhone</td>";
                        if ($csGender == M) {
                            echo "<td>Male</td>";
                        } else {
                            echo "<td>Female</td>";
//                        echo "<td>$csGender</td>";
                        }
                        echo "<td>$csAddress</td>";
//                        echo '<td><button type="submit">Edit</button></td>';
//                        echo '<td><button type="submit">Delete</button></td>';
                       
                        echo "</tr>";
                    }
                    ?>
                    <script>
                        function confirmDelete() {
                            var r = confirm("Are you sure you would like to delete ?");
                            if (r) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    </script>
                </table>
            </fieldset>
        </div>
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> | Edit by Trung - GCH15332 </p>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
