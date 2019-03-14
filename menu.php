<?php
require_once './header.php';
require_once './login.php';
require_once './register.php';
$queryMenu = "SELECT USER.username, USER.image, Course.cImage," .
        "Course.cName, Course.cDescription, Course.cPrice," .
        "course.cId, course.coach FROM Course INNER JOIN USER ON course.coach = USER.uId";
$courseMenu = queryMysql($queryMenu);
?>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
<link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
<link href="css/menu_style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->
<!-- //css files -->

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<head>
    <title>Fitness Health Sports Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Fitness Health Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
          Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- css files -->

    <!-- //google fonts -->

    <!-- scrolling script -->
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script> 
    <!-- //scrolling script -->
</head>
<body>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <h1>
                    <a class="navbar-brand text-white" href="index.php">
                        <i class="fas fa-anchor"></i> FH
                    </a>
                </h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center align-items-center">
                        <li class="nav-item active  mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="index.html">Home 
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
<!--                        <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="#">about /</a>
                        </li>
                        <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="#">Services /</a>
                        </li>
                        <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="#">Blog /</a>
                        </li>
                        <li class="nav-item mr-lg-5 mt-lg-0 mt-3">
                            <a class="nav-link" href="#">contact</a>
                        </li>-->
                        <?php
//                        session_start();
                        if (!isset($userm)) {
                            ?>
                            <li class="nav-item mt-lg-0 mt-3">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fas fa-lock"></i> Login</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <nav>
                                <li>
                                    <a class="nav-link" href="#" > <?php echo $userm; ?></a>
                                    <ul>
                                        <?php if(isset($_SESSION['username'])){ ?>
                                        <li><a href="admin_menu.php" class="nav-link">Edit Profile</a></li>
                                        <?php } ?>
                                        <?php if(isset($_SESSION['cusname'])) { ?>
                                        <li><a href="customer_menu.php" class="nav-link">Profile</a></li>
                                        <?php } ?>
                                        <li><a href="logout.php" class="nav-link">Logout</a></li>
                                    </ul>
                                </li>
                            </nav>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- /.container -->
        </nav>
    </header>
    <!-- //header -->

    <!-- banner -->
    <div class="banner">
        <div class="layer">
            <div class="container">
                <div class="banner-text-agile">
                    <div class="row">
                        <div class="col-lg-7 p-0">
                            <!-- Carousel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <h3 class="b-w3ltxt text-capitalize mt-md-4">
                                            <span>Getting fit is all about mind</span> over matter</h3>
                                        <p class="my-3">onec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus semper Nullam dui mi.
                                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur quis luctus lectus.
                                            Morbi at dui nisl.</p>
                                        <a class="btn btn-banner mt-md-3 mt-2 text-capitalize" href="services.html" role="button">Read More</a>
                                    </div>
                                    <!-- slider text -->
                                    <?php
                                    while ($row = mysqli_fetch_array($courseMenu)) {
                                        $cId = $row[6];
                                        $cName = $row[3];
                                        $cDescription = $row[4];
                                        $cImage = $row[2];
                                        $cPrice = $row[5];
                                        $coach = $row[7];
                                        $coach_name = $row[0];
                                        $coach_image = $row[1];
                                        ?>
                                        <div class = "carousel-item ">
                                            <h3 class = "b-w3ltxt text-capitalize mt-md-4">
                                                <span><img src="./images/Course/<?php echo $cImage ?>" height="150"> </span><?php echo $cName ?></h3>
                                            <p class = "my-3"><?php echo $cDescription ?></p>
                                            <a class = "btn btn-banner mt-md-3 mt-2 text-capitalize" href = "customer_menu.php" role = "button">Join us!</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <!-- slider text -->
                                </div>
                            </div>
                            <!-- Carousel -->
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- //banner -->
