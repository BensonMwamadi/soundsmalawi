<div class="card mt-5 col-md-11 ml-5">
    <div class="card-header">
        <h3 class="card-title">Upload Story</h3></div>
    <div class="card-body">
        <form action="fsystem.php?page=dash_add_story" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <input class="form-control" name="story_title" placeholder="Story title">
            </div>
            <div class="form-group">
                <textarea cols="7" rows="6" class="form-control" name="story_text" placeholder="Story body"></textarea>
            </div>
            <div class="form-group">
                <label>Story image</label>
                <input type='file' name='file' class="form-control">
            </div>
            <button class="btn btn-secondary" name="upload_story" >Upload story</button>
        </form>
    </div>
</div>
<?php
//uploading stories
$server="sv9.byethost9.org";
$username="greenswi";
$password="QQ2NVn9[gu!4y1";
$db="greenswi_soundsmalawi";
$connection=mysqli_connect($server,$username,$password,$db);
if (isset($_POST['upload_story'])) {
    $story_image = $_FILES['file']['name'];
    $story_title = $_POST['story_title'];
    $story_text = $_POST['story_text'];

    $query="INSERT INTO story(story_title,story_text,story_image) VALUES('$story_title','$story_text','$story_image')";
    $send=mysqli_query($connection,$query);
    $destination='img/news/'.$story_image;
    $move=move_uploaded_file($_FILES['file']['tmp_name'], $destination);
    if($move)
    {
        echo "<div class='alert alert-danger'>Story uploaded successfully</div>";
    }
}
?>