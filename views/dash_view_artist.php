<?php
include "controlls/artist.php";
//working with artist
$all_artist=new artist();
$list_all_artist=$all_artist->get_allArtist();
?>
<div class="card mt-4 col-md-11 ml-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">View artist</h3>
            </div>
            <div class="col-md-6 ">
                <h3 class="card-title float-right">
                    <input class="form-control" placeholder="search Artist" id="search_field">
                </h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if ($list_all_artist) { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Artist Name</th>
                <th>Artist Genres</th>
                <th>Artist date added</th>
                <th>Artist image</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; while ($get=mysqli_fetch_array($list_all_artist)){
            $image=$get['artist_image'];
            ?>
            <tr>
            <td><?php print $i++ ?></td>
            <td><?php print $get['artist_name']?></td>
            <td><?php print $get['artist_song_type']?></td>
            <td><?php print $get['artist_date_added']?></td>
            <td><img style="width: 80px; height: 60px; object-fit: cover" src="<?php echo 'img/artist/'.$image ?>"></td>
            </tr>
            <?php } ?>
            </tbody>
            <?php } ?>
        </table>
    </table>
</div>