<?php


class story
{
    function connection(){
        $server="sv9.byethost9.org";
        $username="greenswi";
        $password="QQ2NVn9[gu!4y1";
        $db="greenswi_soundsmalawi";
        $connection=mysqli_connect($server,$username,$password,$db);
        return $connection;
    }
//    geting 6 news
    function getStory(){
        $query="SELECT *FROM story ORDER BY story_date_added DESC LIMIT 6";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    function getStoryByid($id){
        $query="SELECT * FROM story WHERE story_id='$id' ";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    function getAllStory(){
        $query="SELECT * FROM story ORDER BY story_id DESC ";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
//    count news
    function countN(){
        $query="SELECT * FROM story ";
        $result=mysqli_query($this->connection(),$query);
        $number=mysqli_num_rows($result);
        return $number;
    }
}