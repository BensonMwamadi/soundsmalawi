<?php


class artist
{
    var $name,$gene,$city,$image;
    function connection(){
        $server="sv9.byethost9.org";
        $username="greenswi";
        $password="QQ2NVn9[gu!4y1";
        $db="greenswi_soundsmalawi";
        $connection=mysqli_connect($server,$username,$password,$db);
        return $connection;
    }
function getArtist(){
        $query="SELECT * FROM artist ORDER BY RAND() DESC LIMIT 6";
        $result=mysqli_query($this->connection(),$query);
         if (mysqli_num_rows($result)>0){
        return $result;
           }
}
    function get_allArtist(){
        $query="SELECT * FROM artist ORDER BY artist_id DESC";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
//    count artist
    function countA(){
        $query="SELECT * FROM artist ";
        $result=mysqli_query($this->connection(),$query);
        $number=mysqli_num_rows($result);
        return $number;
    }

    function getArtistByid($id){
        $query="SELECT * FROM artist WHERE artist_id='$id' ";
        $result=mysqli_query($this->connection(),$query);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
}