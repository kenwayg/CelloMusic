<?php
session_start();
include_once "config/database.php";
$sql = mysqli_query($conn,"SELECT * FROM album ");
while($res = mysqli_fetch_assoc($sql)){
$url = $res['alb_music'];
};
echo $res['alb_music'].src;

$aplayer = new Aplayer\Aplayer();
$aplayer->out();