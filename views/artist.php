<?php
include "controlls/artist.php";
//working with artist
$all_artist=new artist();
$list_all_artist=$all_artist->get_allArtist();
?>
<div class="about_area mt-5" id="artist">
    <div class="container">
        <?php if ($list_all_artist){?>
            <div class="row ">
                <?php while ($get=mysqli_fetch_array($list_all_artist)){
                    $image=$get['artist_image'];
                    ?>
                    <div class="col-md-4">
                        <div class="about_thumb">
                            <a href="views/single_artist_details.php?id=<?php print $get['artist_id']?>" >
                            <div class="card" style="box-shadow: black 0px 0px 5px 1px ;">
                                <div class="card-header"><?php print $get['artist_name']?></div>
                                <div class="card-body">
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
        <?php }else{print "<div class='alert alert-danger'>No data found</div>";} ?>
    </div>
</div>

