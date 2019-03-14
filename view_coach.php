<?php
require_once './dbconnection.php';
require_once './header.php';
if (!isset($_SESSION['username'])) {
    include_once './customer_menu.php';
} else {
    include_once 'admin_menu.php';
}
//require_once './index.php';
$query = "SELECT * FROM User WHERE status='2'";
$coachList = queryMysql($query);
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
                <span>Manage User</span>
                <i class="fa fa-angle-right"></i>
                <span>View coaches</span>
            </h2>
        </div>
        <div class="banner">
            <fieldset class="banner">
                <!--table here-->
                <table class="tbl">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <?php if (isset($_SESSION['username'])) { ?>
                            <th>Option</th>
                        <?php } ?>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($coachList)) {
                        $uId = $row[0];
                        $uName = $row[1];
                        $uEmail = $row[3];
                        $uImage = $row[4];

                        echo "<tr>";
                        echo "<td>$uId</td>";
                        if ($uImage == null) {
                            echo "<td ><img src='./images/User/default.jpg' width = '80' height='100'></td> ";
                        } else {
                            echo "<td ><img src='./images/User/" . $uImage . "' width = '80' height='100'></td> ";
                        }
//                        echo "<td ><img src='./images/User/" . $uImage . "' height='150'></td> ";
                        echo "<td>$uName</td>";
                        echo "<td>$uEmail</td>";
                        if (isset($_SESSION['username'])) {
                            ?>
                            <td>
                                <form class="frminline" action="update_coach.php" method="post">
                                    <input type="hidden" name="uId" value="<?php echo $row[0] ?>" />
                                    <input type="submit" value="Update" />
                                </form>
                                <form class="frminline" action="delete_coach.php" method="post" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="uId" value="<?php echo $row[0] ?>" />
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </fieldset>
        </div>
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> | Edit by Trung - GCH15332 </p>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--<table class="tbl">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Image</th>   
    </tr>-->
//<?php
//while ($row = mysqli_fetch_array($coachList)) {
//    $Id = $row[0];
//    $Name = $row[1];
//    $Email = $row[3];
//    $Image = $row[4];
//    $Status = $row[5];
//
//    echo "<tr>";
//    echo "<td>$Id</td>";
//    echo "<td>$Name</td>";
//    echo "<td>$Email</td>";
//    echo "<td>$Status</td>";
//    echo "<td ><img src='./images/User/" . $Image . "' width = '80' height='100'></td> ";
//}
//
?>

<!--<div id="page-wrapper" class="gray-bg dashbard-1">
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
                <fieldset class="banner">
<?php
while ($row = mysqli_fetch_array($coachList)) {
    $Name = $row[1];
    $Image = $row[4];
    ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="team-member">
                                        <div class="team-img">
                                            <img src="images/User/<?php echo $Image ?>" height='240' alt="team member" class="img-fluid">
                                        </div>
                                        <div class="team-hover">
                                            <div class="desk">
                                                <a href = "#"> <h4>Join us!</h4> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-title">
                                        <h5><?php echo $Name ?></h5>
                                    </div>
                                </div>
    <?php
}
?>
                </fieldset>
        </div>
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> | Edit by Trung - GCH15332 </p>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>-->

