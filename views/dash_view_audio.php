<?php
include "controlls/music.php";
$othersongs=new music();
$get_others=$othersongs->getAllSongs();
?>
<div class="card mt-4 col-md-11 ml-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">View audios</h3>
            </div>
            <div class="col-md-6 ">
                <h3 class="card-title float-right">
                    <input class="form-control" placeholder="search Artist" id="search_field">
                </h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if ($get_others) { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Artist Name</th>
                <th>Song name</th>
                <th>Song duration</th>
                <th>Song size</th>
                <th>Song gene</th>
                <th>Song likes</th>
                <th>Song votes</th>
                <th>Song date added</th>
                <th>Song icon</th>
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
                <td><?php print $get['audio_duration'] ?></td>
                <td><?php print $get['audio_size'] ?></td>
                <td><?php print $get['audio_gene'] ?></td>
                <td><?php print $get['audio_likes'] ?></td>
                <td><?php print $get['audio_votes'] ?></td>
            <td><?php print $get['audio_date_added']?></td>
            <td><img style="width: 80px; height: 60px; object-fit: cover" src="<?php print 'img/audios_icon/'.$icon_image?>"></td>
            </tr>
            <?php } ?>
            </tbody>
            <?php } ?>
        </table>
    </table>
</div>