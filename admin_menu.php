<?php
require_once './header.php';
if (!isset($userm)) {
    header("Refresh:0; url=index.php");
} else {
    ?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
                  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
            <link href="mcss/bootstrap.min.css" rel='stylesheet' type='text/css' />
            <!-- Custom Theme files -->
            <link href="mcss/style.css" rel='stylesheet' type='text/css' />
            <link href="mcss/font-awesome.css" rel="stylesheet"> 
            <script src="mjs/jquery.min.js"></script>
            <!-- Mainly scripts -->
            <script src="mjs/jquery.metisMenu.js"></script>
            <!-- Custom and plugin javascript -->
            <link href="mcss/custom.css" rel="stylesheet">
            <script src="mjs/custom.js"></script>
            <script src="mjs/screenfull.js"></script>
            <script>
                $(function () {
                    $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

                    if (!screenfull.enabled) {
                        return false;
                    }



                    $('#toggle').click(function () {
                        screenfull.toggle($('#container')[0]);
                    });



                });
            </script>
            <script src="mjs/pie-chart.js" type="text/javascript"></script>
            <script type="text/javascript">
            </script>
            <script src="mjs/skycons.js"></script>
        </head>
        <body>
            <div id="wrapper">

                <!----->
                <nav class="navbar-default navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1> <a class="navbar-brand" href="index.html">Fitness Health</a></h1>         
                    </div>
                    <div class=" border-bottom">
<!--                        <div class="full-left">
                            <section class="full-top">
                                <button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
                            </section>
                            <form class=" navbar-left-right">
                                <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Search...';
                                }">
                                <input type="submit" value="" class="fa fa-search">
                            </form>
                            <div class="clearfix"> </div>
                        </div>-->


                        <!-- Brand and toggle get grouped for better mobile display -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="drop-men" >
                            <ul class=" nav_1">


                                <li class="dropdown">
                                    <a href="admin_menu.php" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $userm; ?></span><?php if($uImage == null){ ?> <img src="./images/User/default.jpg" height="50"> <?php }else{ ?><img src="./images/User/<?php echo $uImage ?>" height="50"> <?php } ?></a>
                                </li>

                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <div class="clearfix">

                        </div>

                        <div class="navbar-default sidebar" role="navigation">
                            <div class="sidebar-nav navbar-collapse">
                                <ul class="nav" id="side-menu">
                                    <li>
                                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Manage User</span><i class="caret"></i></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="add_user.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Add Coach</a></li>

                                            <li><a href="view_coach.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View Coaches</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Manage Course</span><i class="caret"></i></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="add_Course.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Add Course</a></li>

                                            <li><a href="view_course.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View Course</a></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Manage Customer</span><i class="caret"></i></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="add_customer.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Add Customer</a></li>

                                            <li><a href="view_customer.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View Customer</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Order Detail</span><i class="caret"></i></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="order_pending.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Pending</a></li>

                                            <li><a href="order_viewall.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View ordered</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Setting</span><i class="caret"></i></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="logout.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </nav>
            </div>
            <script src="mjs/bootstrap.min.js"></script>
        </body>
    </html>
    <?php
}
?>
