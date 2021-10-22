<?php
if (isset($_POST['gun'])){
    $check_song = $_POST['check_song'];
    $ques = mysqli_query($conn,"INSERT INTO playlist(playlist_name) values( '$check_song')");
  if($ques){
    echo '<script> alert("done")</script>';
  }else{
    echo '<script> alert("bsd")</script>';
    // gg?
  }
  }