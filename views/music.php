<?php
include "controlls/music.php";
$othersongs=new music();
$get_others=$othersongs->getAllSongs();
?>
<div class="music_area music_gallery">
    <div class="container">
        <?php if ($get_others){ ?>
            <div class="row col-md-auto mt-5">
                <?php  while ($get = mysqli_fetch_array($get_others)) {?>
                    <div class="col-md-5 mt-4 mr-5" style="border-bottom: 1px solid red;padding: 2%;cursor: pointer">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <?php
                                        if ($get['audio_icon']==="none"){
                                            $icon_image="headphone.png";
                                        }else{
                                            $icon_image=$get['audio_icon'];
                                        }
                                        ?>
                                        <img style="width: 150px; height: 140px; object-fit: cover" src="<?php print'img/audios_icon/'.$icon_image;?>">
                                    </div>

                                <div class="row play-icon " style=";z-index: 7;position: absolute;">
                                    <div class="col-md-12 ">
                                        <a href="audios/<?php print $get['audio_mp3']?>" style="opacity: 0.6;width: 14px">
                                            <img src="img/play.png" class="img-fluid" style="object-fit: contain;">
                                        </a>
                                    </div>
                                </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <span><b><?php print $get['audio_singer'] ?></b></span>
                                            <h5><?php print $get['audio_title'] ?></h5>
                                            <p><?php print $get['audio_gene'] ?></p>
                                            <p><?php print $get['audio_size'] ?></p>
                                            <p>
                                                <button class="btn btn-dark" id="like_song" data-id="<?php print $get['audio_id'] ?>">
                                                    <?php print $get['audio_likes'] ?> Likes
                                                </button>
                                            </p>
                                            <p class="mt-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <a href="audios/<?php print $get['audio_mp3']?>" download="<?php print $get['audio_mp3']?>" class="p-1 btn btn-success btn-block">
                                              <span class="fa fa-download"></span>  Download
                                          </a>
                                            </div>
                                        </div>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }else{print "<div class='alert alert-danger'>No data found</div>";} ?>
    </div>
    </div>
</div>
