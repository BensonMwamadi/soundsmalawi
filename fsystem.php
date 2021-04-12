<?php
$defaultPage='dash_dashboard';
if (isset( $_GET['page'])){
    $defaultPage=strtolower($_GET['page']);
}
$views='views/'.$defaultPage.'.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SoundzMalawi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/uploadFileSystem.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<div class="row">
    <div class="col-md-12 header">
        <h3 class="text-center mt-4"><b>SOUNDS MALAWI UPLOADING SYSTEM</b></h3>
    </div>
</div>
<div class="row">
    <!--side navigation-->
    <div class="col-md-2 pt-5" id="left_side">
            <div class="col-md-12  mt-5">
                <img src="img/logo3.png" width="200" alt="">
            </div>
        <div class="col-md-12">
        <ul class="outerUl">
            <li class="nav-item">
                <a class="nav-link collapsed" href="fsystem.php" aria-expanded="true" aria-controls="collapseTwo">
                    <h5>Dashboard </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <h5>Music <span class="fa fa-angle-down"></span></h5>
                </a>
                <div id="collapseTwo"  aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-dark  py-2 collapse-inner rounded">
                        <ul class="innerUL">
                            <li><a class="collapse-item" href="fsystem.php?page=dash_add_audio">Add audio</a></li>
                            <li><a class="collapse-item" href="fsystem.php?page=dash_view_audio"">View audio</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
                    <h5>Artist <span class="fa fa-angle-down"></span></h5>
                </a>
                <div id="collapseThree"  aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 collapse-inner rounded">
                        <ul class="innerUL">
                            <li><a class="collapse-item" href="fsystem.php?page=dash_add_artist">Add artist</a></li>
                            <li><a class="collapse-item" href="fsystem.php?page=dash_view_artist">View artist</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
                    <h5>Story <span class="fa fa-angle-down"></span></h5>
                </a>
                <div id="collapseFour"  aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 collapse-inner rounded">
                        <ul class="innerUL">
                            <li><a class="collapse-item" href="fsystem.php?page=dash_add_story">Add story</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        </div>
    </div>
    <!--contain-->
    <div class="col-md-10" id="right_side">
        <?php
        @include(str_replace('views','controlles',$views));
        include($views);

        ?>

    </div>
</div>


<!-- link that opens popup -->

<!-- JS here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
</script>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/audioplayer.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/gijgo.min.js"></script>
<script src="js/slick.min.js"></script>
<!--contact js-->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>

<script src="js/main.js"></script>
<script >
    $(document).ready(function () {
        // search
        $('#search_field').keyup(function(){
            var userInput=$(this).val();
            $('table tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(userInput.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if(found == 'true')
                {
                    $(this).show();
                }
                else
                {
                    $(this).hide();
                }

            });
        });
    });
</script>

</body>

</html>