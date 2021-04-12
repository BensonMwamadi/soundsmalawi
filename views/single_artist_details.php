<?php
include "../controlls/artist.php";
include_once "../controlls/music.php";
$id=$_GET['id'];
//working with artist
$artists=new artist();
$artist_details=$artists->getArtistByid($id);
$artist_songs=new music();
//?>
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
                        <div class="col-xl-2 col-lg-3 d-none d-lg-block search">
                            <div class="social_icon text-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search song" id="userInput">
                                    <div class="input-group-btn">
                                        <a id="send">
                                            <button class="btn btn-default" type="submit">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
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

<div class="about_area mt-5" id="artist">
    <div class="container">
        <?php if ($artist_details){
        while ($get=mysqli_fetch_array($artist_details)){
        $image=$get['artist_image'];
        $list_artist_songs=$artist_songs->getMusicByid($get['artist_name']);
            ?>
        <h3><?php print $get['artist_name']?></h3>
        <hr style="background: red">
        <div class="row">
                <div class="col-md-4">
                    <div class="about_thumb">
                            <div class="card" style="box-shadow: black 0px 0px 5px 1px ;">
                                <div class="card-body">
                                    <img style="width: 100%; height: 340px; object-fit: cover" class="img-fluid" src="<?php echo '../img/artist/'.$image ?>">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Genres</td>
                                            <td><?php print $get['artist_song_type']?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            <div class="col-md-12">
                <p><?php print $get['artist_history']?></p>
            </div>
            <div class="col-md-12 mt-3">
                <div class="panel" >
                    <div class="panel-head">
                        <h3  style="background:#ccc;padding: 10px"><span class="fa fa-music"></span> <?php print $get['artist_name']?> songs</h3>
                    </div>
                <?php
                if ($list_artist_songs){ ?>

                        <div class="panel-body p-2">
                    <?php while ($song=mysqli_fetch_array($list_artist_songs)){ ?>
                        <div class="list-group">
                            <div class="row list-group-item mb-4">
                                <div class="col-md-4">
                                    <span><b><?php print $song['audio_singer'] ?></b></span>
                                </div>
                                <div class="col-md-4">
                                    <span><?php print $song['audio_title'] ?></span>
                                </div>
                                <div class="col-md-4">
                                    <p class="medium"><?php print $song['audio_gene'] ?></p>
                                </div>
                                <div class="col-md-4">
                                    <?php print $song['audio_size'] ?>
                                </div>
                                <div class="col-md-4">
                                    <p class="mt-1">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <a href="../audios/<?php print $song['audio_mp3']?>" download="<?php print $song['audio_mp3']?>" class="float-left btn btn-success btn-block">
                                                <span class="fa fa-download"></span>  Download
                                            </a>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a href="../audios/<?php print $song['audio_mp3']?>"  class="float-right btn btn-outline-danger btn-block">
                                               <span class="fa fa-play"></span>  Listen
                                            </a>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>

                    <?php }?>
                        </div>
                    </div>
                <?php }else{print "<div class='alert alert-danger'>Artist songs not found</div>";} ?>
            </div>
        </div>
    </div>
    <?php } } else{print "<div class='alert alert-danger'>Artist details not found</div>";}?>
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
                            <li>
                                <div class="col-xl-2 col-lg-3 d-inline d-lg-none search  ">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search song" id="searchText">
                                        <div class="input-group-btn">
                                            <a id="sendmobile">
                                                <button class="btn btn-default">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
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
<script>
    $(document).ready(function () {
        // search desktop mode
        $('#send').click(function () {
            var useInput = $("#userInput").val();
            var href = $(this).attr('href', 'search_results.php?input=' + useInput);
        });
        // search phone mode
        $('#sendmobile').click(function () {
            var d = document.getElementById('searchText').value;
            var href = $(this).attr('href', 'search_results.php?input=' + d);
        });
    })
</script>

</body>

