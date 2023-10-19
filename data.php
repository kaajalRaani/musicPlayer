<?php
session_start();
$jsonString = file_get_contents("./data.json");
$data = json_decode($jsonString,true);


$title;
$img;
$id;
$url;

if($_GET['id'] != '' && $_GET['move'] != ''){
    $curr = $_GET['id'];
    $move = $_GET['move'];
    if($move == 'left'){
        $curr = $curr == 1 ? count($data) - 1 : $curr - 2;
    }else{
        $curr = $curr == count($data) ? 0 : $curr;
    }
    $title = $data[$curr]['title'];
    $img = $data[$curr]['artwork'];
    $id = $data[$curr]['id'];
    $url = $data[$curr]['url'];
    $newData = "
    <audio id=\"myAudio\" src=\"$url\"></audio>
    <div class=\"image\">
                <img src=\"$img\" alt=\"\">
            </div>
            <p class=\"title\">$id. $title</p>
            <div class=\"counter\">
                <span class=\"start\">0.00</span>
                <progress class=\"progress-bar\" id=\"progressBar\" value=\"0\" max=\"100\"></progress>
                <span class=\"end\">0.00</span>
            </div>
            <div class=\"btns\">
                <i id=\"left\" class=\"fa-solid fa-angles-left\" onclick=\"Play('$id','left')\"></i>
                <i id=\"playBtn\" class=\"fa-solid fa-play\" onclick=\"Playmusic()\"></i>
                <i id=\"right\" class=\"fa-solid fa-angles-right\" onclick=\"Play('$id','right')\"></i>
            </div>
            ";
    echo $newData;

}else{
    $title = $data[0]['title'];
    $img = $data[0]['artwork'];
    $id = $data[0]['id'];
    $url = $data[0]['url'];
    $newData = "
    <audio id=\"myAudio\" src=\"$url\"></audio>
    <div class=\"image\">
                <img src=\"$img\" alt=\"\">
            </div>
            <p class=\"title\">$id. $title</p>
            <div class=\"counter\">
                <span class=\"start\">0.00</span>
                <progress class=\"progress-bar\" id=\"progressBar\" value=\"0\" max=\"100\"></progress>
                <span class=\"end\">0.00</span>
            </div>
            <div class=\"btns\">
                <i id=\"left\" class=\"fa-solid fa-angles-left\" onclick=\"Play('$id','left')\"></i>
                <i id=\"playBtn\" class=\"fa-solid fa-play\" onclick=\"Playmusic()\"></i>
                <i id=\"right\" class=\"fa-solid fa-angles-right\" onclick=\"Play('$id','right')\"></i>
            </div>
            ";
    echo $newData;
}
