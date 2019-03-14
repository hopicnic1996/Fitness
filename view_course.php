<?php
require_once './dbconnection.php';
require_once './header.php';
if (!isset($_SESSION['username'])) {
    include_once './customer_menu.php';
} else {
    include_once 'admin_menu.php';
}
$query = "SELECT USER.username, USER.image, Course.cImage," .
        "Course.cName, Course.cDescription, Course.cPrice," .
        "course.cId, course.coach FROM Course INNER JOIN USER ON course.coach = USER.uId";
$courseList = queryMysql($query);
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
            </h2>
        </div>
        <div class="banner">
            <fieldset class="banner">
                <!--table here-->
                <table class="tbl">
                    <tr>
                        <th>Coach</th>
                        <th>Course</th>
                        <th></th>
                        <th></th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($courseList)) {
                        $cId = $row[6];
                        $cName = $row[3];
                        $cDescription = $row[4];
                        $cImage = $row[2];
                        $cPrice = $row[5];
                        $coach = $row[7];
                        $coach_name = $row[0];
                        $coach_image = $row[1];

                        echo "<tr>";
                        echo "<td><img src='./images/User/" . $coach_image . "' height='100'>" . $coach_name . "</td>";
                        echo "<td ><img src='./images/Course/" . $cImage . "' height='150'></td> ";
                        echo "<td>$cName</td>";
                        echo "<td>$cDescription</td>";
                        echo "<td>$cPrice</td>";
                        ?>
                        <td>
                            <?php
                            if (isset($_SESSION['cusname'])) {
                                $query8 = "SELECT * FROM cOrder WHERE csId='$csId' AND cId='$cId'";
                                $csCourse = queryMysql($query8);
                                while ($row1 = mysqli_fetch_array($csCourse)) {
                                    $queried_cid = $row1['cId'];
                                    $queried_os = $row1['orStatus'];
                                }
                                if ($queried_cid == $cId) {
                                    if ($queried_os == 2) {
                                        ?>
                                        <form class="frminline" action="#" method="post" onsubmit="return join();">
                                            <a> You are in this course</a>
                                        </form>
                                        <?php
                                    } else {
                                        if ($queried_os == 1) {
                                            ?>
                                            <form class = "frminline" action = "join_course.php" method = "post" onsubmit = "return join();">
                                                <a> Pending </a>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form class = "frminline" action = "join_course.php" method = "post" onsubmit = "return join();">
                                                <a> Refused </a>
                                            </form>
                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <form class="frminline" action="join_course.php" method="post" onsubmit="return join();">
                                        <input type="hidden" name="cId" value="<?php echo $row[6] ?> " />
                                        <input type="submit" value="Join" />
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['username'])) {
                                ?>
                            <form class="frminline" action="update_course.php" method="post">
                                    <input type="hidden" name="cId" value="<?php echo $row[6] ?>" />
                                    <input type="submit" value="Update" />
                                </form>
                            <form class="frminline" action="delete_course.php" method="post" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="cId" value="<?php echo $row[6] ?>" />
                                    <input type="submit" value="Delete" />
                                </form>
                                <?php
                            }
                            ?>

                        </td>
                        <?php
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
                        function join() {
                            var r = confirm("Are you sure you would like to join this Course?")
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