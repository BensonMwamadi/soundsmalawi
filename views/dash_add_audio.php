<div class="card mt-5 col-md-11 ml-5">
    <div class="card-header">
        <h3 class="card-title">Upload audio</h3></div>
    <div class="card-body">
        <form action="fsystem.php?page=dash_add_audio" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <input class="form-control" name="audio_title" placeholder="title">
            </div>
            <div class="form-group">
                <input class="form-control" name="audio_singer" placeholder="singer">
            </div>
            <div class="form-group">
                <input class="form-control" name="audio_duration" placeholder="duration">
            </div>
            <div class="form-group">
                <input class="form-control" name="audio_size" placeholder="size">
            </div>
            <div class="form-group">
                <input class="form-control" name="audio_gene" placeholder="gene">
            </div>
            <div class="form-group">
                <label>audio image</label>
                <input type='file' name='file' class="form-control">
            </div>
            <button class="btn btn-secondary" name="upload" >upload audio</button>
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
    $audio_image = $_FILES['file']['name'];
    $audio_title = $_POST['audio_title'];
    $audio_singer= $_POST['audio_singer'];
    $audio_duration = $_POST['audio_duration'];
    $audio_size=$_POST['audio_size'];
    $audio_gene=$_POST['audio_gene'];

    $query="INSERT INTO music(audio_title,audio_singer,audio_duration,audio_icon,audio_size,audio_gene) 
        VALUES('$audio_title','$audio_singer','$audio_duration','$audio_image','$audio_size','$audio_gene')";
    $send=mysqli_query($connection,$query);
    $destination='img/audios_icon/'.$audio_image;
    $move=move_uploaded_file($_FILES['file']['tmp_name'], $destination);
    if($move)
    {
        echo "<div class='alert alert-danger'>song uploaded successfully</div>";
    }
}
?>