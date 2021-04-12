<?php
$defaultPage='home';
if (isset( $_GET['page'])){
    $defaultPage=strtolower($_GET['page']);
}
$views='views/'.$defaultPage.'.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <script data-ad-client="ca-pub-4130155714548833" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SoundzMalawi</title>
    <meta name="description" content="Sounds malawi is a musical website with an aim to promote music and upcoming artist in malawi">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo3.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/audioplayer.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
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
                                    <a href="index.php">
                                        <img src="img/logo2.png" width="200" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">home</a></li>
                                            <li><a href="index.php?page=artist">Artist</a></li>
                                            <li><a href="index.php?page=music">Songs</a></li>
                                            <li><a href="#contacts">Contacts</a></li>
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
                                                   <button class="btn btn-success" type="submit">
                                                       Search
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

    <?php
    @include(str_replace('views','controlles',$views));
    include($views);
    ?>
    <div class="btn-warning mb-1 p-1 text-center">Covid-19 is real,stay home stay safe</div>

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
                                Sounds malawi is a musical website with an aim of promoting music and  upcoming artist  in malawi.
                                Using this website you can download any type of music you want for free!
                                Feel free to contact us for feedback and any queries.
                            </p>

                        </div>
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
        <div class="copy-right_text" >
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-5 col-md-6">
                        <div class="footer_links">
                            <ul>
                                <li><a href="index.php">home</a></li>
                                <li><a href="index.php?page=artist">Artist</a></li>
                                <li><a href="index.php?page=music">Songs</a></li>
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

    <script>
        var onVisible=function(obj,func){
            window.addEventListener("scroll",function(){
                var element=document.getElementById(obj);
                var pos=element.getBoundingClientRect();
                var h=pos.height;
                var c=pos.top;
                var mainHeight=window.screen.height;
                var pcn=(c/mainHeight)*100;
                if(c<mainHeight && (c+h)>0){
                    func(true,pcn)
                }
                else{
                    func(false,pcn)
                }
            })
        };

        $(document).ready(function () {
            onVisible('tryDiv',function (visible,per) {
                if (visible===false){
                    var page=1;
                    $.ajax({
                        url:'controlls/All_music.php?page=page',
                        type:'POST',
                        success:function (a) {
                            $('#tryDiv').append(a);
                        },
                        error:function () {
                            alert("Connection error")
                        }
                    })
                }

            });


            $("#message").hide();
            // search desktop mode
            $('#send').click(function () {
                var useInput=$("#userInput").val();
                var href=$(this).attr('href','views/search_results.php?input='+useInput);
            });
            // search phone mode
            $('#sendmobile').click(function () {
                var d=document.getElementById('searchText').value;
                var href=$(this).attr('href','views/search_results.php?input='+d);
            });
            // likes
            $('.name').find("#like_song").click(function () {
                var get_song_id=$(this).attr('data-id');
                var js={};
                js.song_id=get_song_id;
                js.method="like_song";
                js=JSON.stringify(js);
                $.ajax({
                    url:'caller.php',
                    type:'POST',
                    data:'data='+js,
                    success:function (a) {
                       if (a==="songLiked"){
                           location.reload(true);
                       }
                    },
                    error:function () {
                        alert("Connection error")

                    }
                })

            });
            // vote
            $("#vote").submit(function (event) {
                event.preventDefault();
                var song_artist=$("#song_artist").val();
                var song_name=$("#song_name").val();
                if (song_artist===""){
                    $("#message").show().html("Artist name is empty");
                    return;
                }if (song_name===""){
                    $("#message").show().html("Song name is empty");
                    return;
                }
                var js={};
                js.song_name=song_name;
                js.song_artist=song_artist;
                js.method="vote";
                js=JSON.stringify(js);
                $.ajax({
                    url:'caller.php',
                    type:'POST',
                    data:'data='+js,
                    success:function (a) {
                        $("#message").show().html(a);
                    },
                    error:function () {
                        $("#message").show().html("Connection error");

                    }
                })

            });
            $(".sendFeedback").click(function () {
                var email_address=$("#email_address").val();
                var feedback=$(".message").val();
                if (email_address===""){
                    alert("email is required");
                    return;
                }if (feedback===""){
                    alert("message is required");
                    return;
                }
                var js={};
                js.email_address=email_address;
                js.message=message;
                js.method="feedback";
                js=JSON.stringify(js);
                $.ajax({
                    url:'caller.php',
                    type:'POST',
                    data:'data='+js,
                    success:function (a) {
                        alert(a)
                    },
                    error:function () {
                       alert("Connection error");

                    }
                })


            })
            $(".cancel-covid").click(function () {
                $(".covid-alert").css("display","none")

            })
             $(".download-btn").click(function () {
                var audio_id=$(this).attr("data-id");
                var dataS={method:"download_audio",audio_id:audio_id};
                dataS=JSON.stringify(dataS);
                $.ajax({
                    url:'caller.php',
                    type:'POST',
                    data:'data='+dataS,
                    success:function (a) {
                    },
                    error:function () {
                        alert("Connection error");

                    }
                })
            })
        });
    </script>
</body>

</html>