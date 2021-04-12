<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest') {
    $data = json_decode(@$_POST['data']);

    if ($data->method==="like_song"){
       include "controlls/music.php";
       $new_like=new music();
       $new_like->song_id=$data->song_id;
       $new_like->likeSong();
    }elseif ($data->method==="vote"){
        include "controlls/music.php";
        $voter=new music();
        $voter->song_artist=$data->song_artist;
        $voter->song_name=$data->song_name;
        $voter->voteSong();
    }elseif ($data->method="download_audio"){
        include_once "controlls/music.php";
        $download=new music();
        $download->addTo($data->audio_id);
    }
}
