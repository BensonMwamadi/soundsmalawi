<?php
include "controlls/story.php";
include "controlls/artist.php";
include "controlls/music.php";
//working with artist
$artist=new artist();
$list_artist=$artist->getArtist();

$all_artist=new artist();
$list_all_artist=$all_artist->get_allArtist();
//working with latest songs
$latest=new music();
$get_latest=$latest->latestSongs();
//working with other songs
$othersongs=new music();
$get_others=$othersongs->otherSongs();
?>

<!-- artist  -->
<div class="about_area mt-5" id="artist">
    <div class="container">
        <?php if ($list_artist){?>
            <div class="row ">
                <?php while ($get=mysqli_fetch_array($list_artist)){
                    $image=$get['artist_image'];
                    ?>

                    <div class="col-md-4">
                        <div class="about_thumb">
                            <a href="views/single_artist_details.php?id=<?php print $get['artist_id']?>" >
                            <div class="card" style="box-shadow: black 0px 0px 5px 1px ;">
                                <div class="card-header"><?php print $get['artist_name']?></div>
                                <div class="card-body">
                                    <?php ?>
                                    <img style="width: 100%; height: 340px; object-fit: cover" class="img-fluid" src="<?php echo 'img/artist/'.$image ?>">
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
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <!--            more button-->
        <div class="row mt-3">
            <div class="col-xl">
                <div class="section_title text-center mb-65">
                    <a href="index.php?page=artist"><button class="btn btn-dark">More Artist</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ artist  -->

<!-- music_area  -->
<div class="music_area music_gallery">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <h3>Latest Songs</h3>
                </div>
            </div>
        </div>
        <?php if ($get_latest){ ?>
        <div class="row col-md-auto mt-5">
            <?php  while ($get = mysqli_fetch_array($get_latest)) {?>
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
                                    <img style=" object-fit: cover" src="<?php print'img/audios_icon/'.$icon_image;?>">
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
                                        <p class="medium"><?php print $get['audio_gene'] ?></p>
                                        <?php print $get['audio_size'] ?>
                                        <p>
                                            <button class="btn btn-dark" id="like_song" data-id="<?php print $get['audio_id'] ?>">
                                                <?php print $get['audio_likes'] ?>  Likes
                                            </button>
                                        </p>
<!--                                        <p class="mt-1">-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-md-12">-->
<!--                                                <a href="audios/--><?php //print $get['audio_mp3']?><!--" download="--><?php //print $get['audio_mp3']?><!--" class="p-1 btn btn-success btn-block">-->
<!--                                                    <span class="fa fa-download"></span>  Download-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-12 mt-2">-->
<!--                                                <a href="audios/--><?php //print $get['audio_mp3']?><!--"  class=" btn btn-outline-danger btn-block">-->
<!--                                                    <span class="fa fa-play"></span>  Listen-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        </p>-->
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
        <?php }else{print "<div class='alert alert-danger'>No data found</div>";}?>
    </div>
<!--    other tracks-->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-1 mt-5">
                    <h3>Other Songs</h3>
                </div>
            </div>
        </div>
        <?php if ($get_others) { ?>
        <div class="row col-md-auto mt-5">
            <?php  while ($get = mysqli_fetch_array($get_others)) {?>
            <div class="col-md-5 mt-4 mr-5" style="border-bottom: 1px solid grey;padding: 2%;cursor: pointer" >
                <div class="row align-items-center">
                    <div class="col-xl-9 col-md-9" id="show_holder">
                        <div class="music_field">
                            <div class="thumb music-icon">
                                <?php
                                if ($get['audio_icon']==="none"){
                                    $icon_image="headphone.png";
                                }else{
                                    $icon_image=$get['audio_icon'];
                                }
                                ?>
                                <img style="object-fit: cover" src="<?php print 'img/audios_icon/'.$icon_image?>">
                            </div>
                            <div class="row play-icon " style=";z-index: 7;position: absolute;">
                                <div class="col-md-12">
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
                                            <a href="audios/<?php print $get['audio_mp3']?>" download="<?php print $get['audio_mp3']?>"  class="p-1 btn btn-success btn-block">
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
        <?php }else{print "<div class='alert alert-danger'>No trucks found</div>";} ?>
        <!--            more button-->
        <div class="row mt-5">
            <div class="col-xl">
                <div class="section_title text-center mb-65">
                    <a href="index.php?page=music"><button class="btn btn-dark">More Songs</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- music_area end  -->
