<?php
include "controlls/music.php";
//working with top 10 chart
$audio=new music();
$list_audio=$audio->getTop10();
//getting the selected song
$audio_id=$_GET['id'];
$de=$audio->getDowloadSong($audio_id);
?>
<!-- header-end -->
<div class="music_area music_gallery mt-5" >
    <div class="container">
        <?php if ($de){
        while ($dome=mysqli_fetch_array($de)){
            ?>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="list-group">
                    <div href="#" class="list-group-item bg-warning advert">
                        <p class="list-group-item-text ">
                        <h4 class="font-weight-bold">Together we can fight covid-19</h4>
                        <p class="font-italic">1.Use tissue or elbow when coughing and sneezing.</p>
                        <p class="font-italic">2.Wash your hands thoroughly and regularly.</p>
                        <p class="font-italic">3.Keep your distance.</p>
                        <p class="font-italic">4.Avoid shaking hands.</p>
                        <p class="font-italic">5.Stay home if your ill</p>
                        <p class="font-italic">6.Be kind,avoid stigma.</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <ul class="list-group">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#">
                                <img src="img/fb.png" class="img-fluid" style="width:42px;object-fit: contain;">
                            </a>
                            <a href="http://wa.me/+265886641983?text=Hellosoundsmalawiteam">
                                <img src="img/whatsapp.png" class="img-fluid" style="width:42px;object-fit: contain;">
                            </a>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="col-md-12 mb-2">
                <h1 class="font-weight-bold"><?php print $dome['audio_singer']?></h1>
                <h3 ><?php print $dome['audio_title']?></h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="audios/<?php print $dome['audio_mp3']?>" download="<?php print $dome['audio_mp3']?>"
                   class="btn btn-danger font-weight-bold font-italic download-btn" data-id="<?php print $dome['audio_id']?>">
                    Download now!
                </a>
                <p><span class="font-weight-bold"><?php print $dome['audio_downloads']?> Downloads</span></p>
            </div>
            <div class="col-md-12 mb-3">
                <h3 style="border-bottom:1px solid #ccc"><span>Vote for the song</span></h3>
                <button class="btn btn-dark w-25 disabled"><span class="font-weight-bold">(<?php print $dome['audio_votes']?>)Votes</span></button>
            </div>

            <?php } } ?>
            <div class="col-md-12">
                <h3  style="background:#ccc;padding: 10px"><span class="fa fa-fire"></span>  Hot songs</h3>

        <?php if($list_audio){?>
        <div class="row col-md-auto ">
            <?php $i=1; while ($get=mysqli_fetch_array($list_audio)){
            ?>
            <div class="col-md-5 mt-4 mr-5" style="border-bottom: 1px solid red;padding: 2%;cursor: pointer">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-md-9 ">
                        <div class="music_field ">
                            <span>#<?php print $i++;?></span>
                            <div class="thumb">
                                <?php
                                if ($get['audio_icon']==="none"){
                                    $icon_image="headphone.png";
                                }else{
                                    $icon_image=$get['audio_icon'];
                                }
                                ?>
                                <img style=" object-fit: cover;" src="<?php print'img/audios_icon/'.$icon_image;?>">
                            </div>
                            <div class="audio_name">
                                <div class="name">
                                    <span><b><?php print $get['audio_singer']?></b></span>
                                    <h5><?php print $get['audio_title']?></h5>
                                    <p><?php print $get['audio_gene']?></p>
                                    <p>(<?php print $get['audio_votes']?>)Votes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php }?>
            </div>
        </div>
    </div>
</div>
