<?php


class music
{
    var $song_id,$song_artist,$song_name;
    function connection(){
        $server="sv9.byethost9.org";
        $username="greenswi";
        $password="QQ2NVn9[gu!4y1";
        $db="greenswi_soundsmalawi";
        $connection=mysqli_connect($server,$username,$password,$db);
        return $connection;
    }
//    top 10 chart
    function getTop10(){
        $query="SELECT * FROM music ORDER BY audio_votes DESC LIMIT 10";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
//    latest songs
    function latestSongs(){
        $query="SELECT * FROM music  ORDER BY audio_id DESC LIMIT 10";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    //    old  songs
    function otherSongs(){
        $query="SELECT * FROM music ORDER BY  RAND() DESC LIMIT 6";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    //all songs
    function getAllSongs(){
        $query="SELECT * FROM music ORDER BY audio_id DESC ";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    //like song
    function likeSong(){
        $query="SELECT * FROM music WHERE audio_id='$this->song_id'";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
           $row=mysqli_fetch_array($result);
           $song_current_likes= $row['audio_likes'];
        }
        $new_like=@$song_current_likes+1;
        $sql="UPDATE music SET audio_likes='$new_like' WHERE audio_id='$this->song_id'";
        $do_updation=$this->connection()->query($sql);
        if ($do_updation){
            echo "songLiked";
        }

    }
//    vote for song
function voteSong(){
//        getting the user IP ADDRESS
        $ip="";
       if (!empty($_SERVER['HTTP_CLIENT_IP'])){
           $ip=$_SERVER['HTTP_CLIENT_IP'];
           echo $ip;
       }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
           $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       }else{
           $ip=$_SERVER['SERVER_ADDR'];
       }
//       checking in bd
    $query="SELECT * FROM user_sessions WHERE user_session_name='$ip' AND user_session_song_name='$this->song_name' ";
    $result=mysqli_query($this->connection(),$query);
    if ($row=mysqli_num_rows($result)>0){
//        already voted
        echo "You have already voted for that song";
    }else{
//        not voted
//        filtering from music db
        $query2="SELECT * FROM music WHERE audio_title='$this->song_name' AND audio_singer ='$this->song_artist'";
        $result_music=mysqli_query($this->connection(),$query2);
        if ($row=mysqli_num_rows($result_music)>0){
//            audio found
            $sql="INSERT INTO user_sessions(user_session_name,user_session_song_name,user_session_song_artist)
            VALUES ('$ip','$this->song_name','$this->song_artist')";
            $send=$this->connection()->query($sql);
            if ($send){
//                update audio votes
                $qry="SELECT * FROM music WHERE audio_title='$this->song_name' AND audio_singer ='$this->song_artist'";
                $result_music=mysqli_query($this->connection(),$qry);
                $row=mysqli_fetch_array($result_music);
                $current_votes=$row['audio_votes'];

                $new_vote=@$current_votes+1;
                $sql="UPDATE music SET audio_votes='$new_vote' WHERE audio_singer='$this->song_artist' AND audio_title='$this->song_name'";
                $do_updation=$this->connection()->query($sql);
                if ($do_updation){
                    echo "Voted successfully";
                }else{
                    echo "Fail to vote..Please try again";
                }

            }
        }else{
//            audio not found
            echo "Song/artist not found..Please check your inputs";
        }

    }

}
//    search music
function search($input){
    $query="SELECT * FROM music WHERE audio_title LIKE '%$input%' OR audio_singer LIKE '%$input%'";
    $result=mysqli_query($this->connection(),$query);
    if (mysqli_num_rows($result)>0){
        return $result;
    }
}
//   countMusic
    function countM(){
        $query="SELECT * FROM music";
        $result=mysqli_query($this->connection(),$query);
        $number=mysqli_num_rows($result);
        return $number;
    }
//    get single song
    function getMusicByid($singer){
        $query="SELECT * FROM music WHERE audio_singer LIKE '%$singer%' ";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
//    increment download
function addTo($audio_id){
        $add_number=1;
    $query="SELECT * FROM music WHERE audio_id='$audio_id' ";
    $result=mysqli_query($this->connection(),$query);
    if (mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $current_downloads=$row['audio_downloads'];
        $new_downloads=@$current_downloads+$add_number;
        $sql="UPDATE music SET audio_downloads='$new_downloads' WHERE audio_id='$audio_id'";
        $updation=$this->connection()->query($sql);
        if ($updation){
            echo "successfully";
        }else{
            echo "Fail";
        }


    }
}

}