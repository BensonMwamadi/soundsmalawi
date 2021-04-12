<?php
include "controlls/music.php";
include "controlls/story.php";
include "controlls/artist.php";
$artist=new artist();
$news=new story();
$othersongs=new music();
$get_others=$othersongs->getTop10();
?>
<div class="row">
    <!--statistics-->
    <div class="row mt-5 ml-5 mb-2 col-md-12">
        <div class="col-md-3 bg-light mr-1 single_statistic">
        <b>Total music</b>
            <p style="text-align: center;padding-top: 15px;font-size: 60px"><?php print $othersongs->countM()?></p>
        </div>
        <div class="col-md-3 bg-info mr-1 single_statistic">
            <b>Total artist</b>
            <p style="text-align: center;padding-top: 15px;font-size: 60px"><?php print $artist->countA()?></p>
        </div>
        <div class="col-md-4 btn-dark single_statistic">
            <b>Total news</b>
            <p style="text-align: center;padding-top: 15px;font-size: 60px"><?php print $news->countN()?></p>
        </div>
    </div>
    <!--Current top 10 -->
    <div class="card mt-2 ml-5 col-md-11">
        <div class="card-header"><h3>Current top 10</h3></div>
        <div class="card-body">
            <?php if ($get_others) { ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Artist Name</th>
                    <th>Song name</th>
                    <th>Song gene</th>
                    <th>Song votes</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; while ($get = mysqli_fetch_array($get_others)) {
                    if ($get['audio_icon']==="none"){
                        $icon_image="headphone.png";
                    }else{
                        $icon_image=$get['audio_icon'];
                    }
                    ?>
                    <tr>
                        <td><?php print $i++ ?></td>
                        <td><?php print $get['audio_singer'] ?></td>
                        <td><?php print $get['audio_title'] ?></td>
                        <td><?php print $get['audio_gene'] ?></td>
                        <td><?php print $get['audio_votes'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <?php } ?>
            </table>

        </div>
    </div>
</div>