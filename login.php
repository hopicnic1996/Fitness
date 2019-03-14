<?php
require_once './dbconnection.php';
require_once './header.php';
//require_once './menu.php';
//xampp: error_reporting(0);
if (isset($_POST['email'])) {
    $email = sanitizeString($_POST['email']);
    $pass = sanitizeString($_POST['pass']);
    $token = passwordToToken($pass);
    $result = queryMysql("SELECT * FROM user WHERE email = '$email' AND password = '$token'");
    if ($result->num_rows == 0) {
        $result1 = queryMysql("SELECT * FROM customer WHERE csEmail = '$email' AND csPassword = '$token'");
        if ($result1->num_rows == 0) {
            ?>
            }
            <script>
                alert("Invalid username/password !");
                window.location.href = 'index.php';
            </script>
            <?php
        } else {
            session_start();
            $row = mysqli_fetch_assoc($result1);
            $queried_name = $row['csName'];
            $queried_id = $row['csId'];
            $queried_image = $row['csImage'];
            $_SESSION['csId'] = $queried_id;
            $_SESSION['password'] = $pass;
            $_SESSION['email'] = $email;
            $_SESSION['cusname'] = $queried_name;
            $_SESSION['csImage'] = $queried_image;
            header("Refresh:0; url=index.php");
        }
    } else {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $queried_name = $row['username'];
        $queried_id = $row['uId'];
        $queried_status = $row['status'];
        $queried_image = $row['image'];
        $_SESSION['uId'] = $queried_id;
        $_SESSION['password'] = $pass;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $queried_name;
        $_SESSION['uImage'] = $queried_image;
//            header("Location: index.php"); //redirect
        header("Refresh:0; url=index.php");
//            echo $_SESSION['username'];
    }
}
?>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
<link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
<link href="css/menu_style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->
<!-- //css files -->

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Login Now</h5>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label class="mb-2">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                        </div>
                        <span class="error"><?php echo $error ?></span>
                        
                        <button type="submit" class="btn btn-primary submit mb-4">Sign In</button>
                        <p class="text-center pb-4">
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter2"> Don't have an account?</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- //js -->

<!-- Banner text Responsiveslides -->
<script src="js/responsiveslides.min.js"></script>
<script>
                    // You can also use"$(window).load(function() {"
                    $(function () {
                        // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
</script>
<!-- //Banner text  Responsiveslides -->

<script src="js/smoothscroll.js"></script><!-- Smooth scrolling -->

<!-- start-smoth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
                    jQuery(document).ready(function ($) {
                        $(".scroll").click(function (event) {
                            event.preventDefault();
                            $('html,body').animate({
                                scrollTop: $(this.hash).offset().top
                            }, 900);
                        });
                    });
</script>
<script>
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
