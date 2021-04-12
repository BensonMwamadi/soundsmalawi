<?php
include "controlls/story.php";
//working with news
$stories=new story();
$list_stories=$stories->getAllStory();
?>
<div class="about_area mt-5" id="news">
    <div class="container">
        <?php if ($list_stories){?>
        <div class="row">
            <?php while ($get=mysqli_fetch_array($list_stories)){
            $image=$get['story_image'];
//            working with date
            $added_date=explode(' ',$get['story_date_added']);
//            getting month
            $month=explode('-',$added_date[0]);
            $monthsInYear=array(
                "01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July",
                "08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December"
                );
            $realAdded=$month[2]."  ".$monthsInYear[$month[1]]." ".$month[0];
            $str=substr( $get['story_text'],0,410);
            ?>
            <div class="col-md-6 mb-4">

                <a href="views/single_news.php?id=<?php print $get['story_id']?>" >
                <div class="card">
                    <div class="card-body">
                        <img style="width: 100%; height: 400px; object-fit: cover" class="img-fluid" src="<?php echo 'img/news/'.$image ?>" alt="">
                        <p>
                        <h3><?php print $get['story_title']?></h3>
                        </p>
                    </div>
                    <div class="card-footer">
                        <span><?php print $realAdded?></span>
                    </div>
                </div>  </a>
            </div>
            <?php } ?>
        </div>
        <?php }else{print "<div class='alert alert-danger'>No news found</div>";} ?>
    </div>
    </div>

