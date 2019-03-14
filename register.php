<?php
require_once 'dbconnection.php';
//xampp: error_reporting(0);
//getting the data
if (isset($_POST['register'])) { //adding
    $csName = sanitizeString($_POST['csName']);
    $csEmail = sanitizeString($_POST['csEmail']);
    $csPass = sanitizeString($_POST['csPass']);
    $token = passwordToToken($csPass);
    $query_check = "SELECT * FROM Customer WHERE csEmail = '$csEmail'";
    $check_result = queryMysql($query_check);
    if ($check_result ->num_rows == 0) {
        $query = "INSERT INTO Customer(csName,csEmail,csPassword,csDoB,csPhone,csGender,csAddress,csImage)" . " values ('$csName','$csEmail', '$token',null,null,null,null,null)";
        $result = queryMySql($query);
        header("Refresh:0; url=index.php");
    } else {
        ?>
        <script>
            alert("Account already exsit !");
            window.location.href = 'index.php';
        </script>
        <?php
    }
}
?>
<!--<form action="register.php" method="post">
    <div class="form-group">
        <label>Name</label>

        <input type="text" name="csName" class="form-control" placeholder="" required="">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="csEmail" class="form-control" placeholder="" required="">
    </div>

    <div class="form-group">
        <label class="mb-2">Password</label>
        <input type="password" name="csPass" class="form-control" placeholder="" required="">
    </div>

<?php echo $error ?>
    <button type="submit" name="register" value="register" class="btn btn-primary submit mb-4">Register</button>
    <p class="text-center pb-4">
        <a href="#">By clicking Register, I agree to your terms</a>
    </p>
</form>-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
<link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
<link href="css/menu_style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->
<!-- //css files -->

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Register Now</h5>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label>Name</label>

                            <input type="text" name="csName" class="form-control" id="validationDefault01" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="csEmail" class="form-control" id="validationDefault02" placeholder="" required="">
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" name="csPass" class="form-control" id="password1" placeholder="" required="">
                        </div>
                        <button type="submit" name="register" value="register" class="btn btn-primary submit mb-4">Register</button>
                        <p class="text-center pb-4">
                            <a href="#">By clicking Register, I agree to your terms</a>
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
