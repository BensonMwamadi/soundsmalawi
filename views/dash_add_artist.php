<div class="card mt-5 col-md-11 ml-5">
    <div class="card-header">
        <h3 class="card-title">Upload artist</h3></div>
    <div class="card-body">
        <form action="fsystem.php?page=dash_add_artist" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <input class="form-control" name="artist_name" placeholder="artist name">
            </div>
            <div class="form-group">
                <input class="form-control" name="artist_gene" placeholder="artist gene">
            </div>
            <div class="form-group">
                <textarea class="form-control" cols="6" rows="7" name="artist_history" placeholder="artist history"></textarea>
            </div>
            <div class="form-group">
                <label>artist image</label>
                <input type='file' name='file' class="form-control">
            </div>
            <button class="btn btn-secondary" name="upload" >upload artist</button>
        </form>
    </div>
</div>
<?php
//$server="sv9.byethost9.org";
//$username="greenswi";
//$password="QQ2NVn9[gu!4y1";
//$db="greenswi_soundsmalawi";
$server="localhost";
$username="root";
$password="";
$db="soundmalawi";
$connection=mysqli_connect($server,$username,$password,$db);
//    uploading artist
if (isset($_POST['upload'])) {
    $artist_image = $_FILES['file']['name'];
    $artist_name = $_POST['artist_name'];
    $artist_history = $_POST['artist_history'];
    $artist_gene = $_POST['artist_gene'];

    $query="INSERT INTO artist(artist_name,artist_image,artist_song_type,artist_history) VALUES('$artist_name','$artist_image','$artist_gene','$artist_history')";
    $send=mysqli_query($connection,$query);
    $destination='img/artist/'.$artist_image;
    $move=move_uploaded_file($_FILES['file']['tmp_name'], $destination);
    if($move)
    {
        echo "<div class='alert alert-danger'>Artist uploaded successfully</div>";
    }
}
?>