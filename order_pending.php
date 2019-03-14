<?php
require_once './dbconnection.php';
include_once './admin_menu.php';
$query = "SELECT * FROM corder WHERE orstatus='1'";
$pending = queryMysql($query);

if(isset($_POST['accpet'])){
    $orId = sanitizeString($_POST['orId']);
    $orStatus = 2;
    $query1 = "UPDATE corder SET orStatus ='$orStatus' WHERE orId = '$orId'";
//    UPDATE User SET username = '$username', email = '$email', image = '$image' WHERE uId = '$csId'
    queryMysql($query1);
    header("Refresh:0; url= order_pending.php");
}
if(isset($_POST['refuse'])){
    $orId = sanitizeString($_POST['orId']);
    $orStatus = 3;
    $query1 = "UPDATE corder SET orStatus ='$orStatus' WHERE orId = '$orId'";
//    UPDATE User SET username = '$username', email = '$email', image = '$image' WHERE uId = '$csId'
    queryMysql($query1);
    header("Refresh:0; url= order_pending.php");
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
                <span>Order Detail</span>
                <i class="fa fa-angle-right"></i>
                <span>Pending</span>
            </h2>
        </div>
        <div class="banner">
            <fieldset class="banner">
                <!--table here-->
                <?php
                if($pending->num_rows == 0){
                        echo "<a> There are no Order pending</a>";
                    }else {
                        ?>
                <table class="tbl">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer email</th>
                        <th>Course name</th>
                        <th>Order date</th>
                        <th>Option</th>
                    </tr>
                    <?php
                    
                    while ($row = mysqli_fetch_array($pending)) {
                        $orId = $row[0];
                        $orDate = $row[1];
                        $orCus = $row[3];
                        $orCos = $row[4];
                        $query_Cus = "SELECT * FROM customer WHERE csId='$orCus'";
                        $query_Cos = "SELECT * FROM course WHERE cId='$orCos'";
                        $Cus = queryMysql($query_Cus);
                        $Cos = queryMysql($query_Cos);
                        $row2 = mysqli_fetch_assoc($Cus);
                        $row3 = mysqli_fetch_assoc($Cos);
                        $Cus_name = $row2['csEmail'];
                        $Cos_name = $row3['cName'];
                        echo "<tr>";
                        echo "<td>$orId</td>";
                        echo "<td>$Cus_name</td>";
                        echo "<td>$Cos_name</td>";
                        echo "<td>$orDate</td>";
                        ?>
                        <td>
                            <form class="frminline" action="order_pending.php" method="post">
                                <input type="hidden" name="orId" value="<?php echo $row[0] ?> " />
                                <input type="submit" name="accpet" value="Accept" />
                            </form>
                            <form class="frminline" action="order_pending.php" method="post">
                                <input type="hidden" name="orId" value="<?php echo $row[0] ?> " />
                                <input type="submit" name="refuse" value="Refuse" />
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
                </table>
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
</div>