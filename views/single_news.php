<?php
include "../controlls/story.php";
//working with news
$news_id=$_GET['id'];
$stories=new story();
$list_stories=$stories->getStoryByid($news_id);
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/audioplayer.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/gijgo.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

<!-- header-start -->
<header>
    <div class="header-area " style="background:#003333;">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="../index.php">
                                    <img src="../img/logo2.png" width="200" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="../index.php">home</a></li>
                                        <li><a href="../index.php?page=artist">Artist</a></li>
                                        <li><a href="#music">Music</a></li>
                                        <li><a href="../index.php#top10">Top 10 chart</a></li>
                                        <li><a href="../index.php?page=news">News</a></li>
                                        <li><a href="index.php?page=vote">Vote</a></li>
                                        <li><a href="#about_us">About us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->
<div class="about_area mt-5" id="news">
        <?php if ($list_stories){?>
            <div class="row align-items-center ">
                <?php while ($get=mysqli_fetch_array($list_stories)){
                    $image=$get['story_image'];
                    $added_date=explode(' ',$get['story_date_added']);
//                    getting month
                    $month=explode('-',$added_date[0]);
                    $monthsInYear=array(
                        "01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July",
                        "08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December"
                    );
                    $realAdded=$month[2]."  ".$monthsInYear[$month[1]]." ".$month[0];
                    ?>
                    <div class=" col-md-12">
                        <div class="about_info pl-4">
                            <h2><?php print $get['story_title']?></h2>
                        </div>
                    </div>
                    <div class=" col-md-12 ml-3 mr-3">
                        <div class="about_thumb">
                            <img style="width: 100%; height: 440px; object-fit: cover" class="img-fluid" src="<?php echo '../img/news/'.$image ?>" alt="">
                        </div>
                    </div>
                    <div class=" col-md-12">
                        <div class="about_info ml-3 mr-3" data-id="<?php print $get['story_id']?>">
                            <span><?php print $realAdded?></span>
                            <p><?php print $get['story_text']?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }else{print "<div class='alert alert-danger'>No data found</div>";} ?>
</div>
<!-- footer start -->
<footer class="footer" id="contacts">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class=" col-md-12 ">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            About us
                        </h3>
                        <p>
                            Sounds malawi is a musical website with an aim to promote music and  upcoming artist  in malawi.
                            Using this website you can download any type of music you want for free!
                            Feel free to contact us for feedback and any queries.
                        </p>

                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Talk to us
                        </h3>
                        <form class="form-contact contact_form" action="contact_process.php" method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="email" placeholder='Email' style="color: white">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" style="color: white" id="message" cols="30" rows="9" placeholder=' Message'></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" col-md-12 ">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Contact Us
                        </h3>
                        <ul>
                            <li><a href="#"><span class="contact-info__icon"><i class="ti-email"></i></span> soundsmalawi@gmail.com
                                </a></li>
                            <li><a href="#"><span class="contact-info__icon"><i class="ti-tablet"></i></span> +256(0)886641983
                                </a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-5 col-md-6">
                    <div class="footer_links">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="index.php?page=artist">Artist</a></li>
                            <li><a href="index.php?page=music">Music</a></li>
                            <li><a href="index.php#top10">Top 10 chart</a></li>
                            <li><a href="index.php?page=news">News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- link that opens popup -->

<!-- JS here -->
<script src="../https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
</script>
<script src="../js/vendor/modernizr-3.5.0.min.js"></script>
<script src="../js/vendor/jquery-1.12.4.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/isotope.pkgd.min.js"></script>
<script src="../js/ajax-form.js"></script>
<script src="../js/waypoints.min.js"></script>
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/imagesloaded.pkgd.min.js"></script>
<script src="../js/audioplayer.js"></script>
<script src="../js/scrollIt.js"></script>
<script src="../js/jquery.scrollUp.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/nice-select.min.js"></script>
<script src="../js/jquery.slicknav.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/gijgo.min.js"></script>
<script src="../js/slick.min.js"></script>
<!--contact js-->
<script src="../js/contact.js"></script>
<script src="../js/jquery.ajaxchimp.min.js"></script>
<script src="../js/jquery.form.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/mail-script.js"></script>

<script src="../js/main.js"></script>

</body>

