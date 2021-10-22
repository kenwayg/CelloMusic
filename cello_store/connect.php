<?php
      include_once "config/dbh.php";
      session_start();
      $user = $_SESSION['user'];
        $check_song = $_POST['check_song'];
        $act = $_POST['action'];
        $desc = $_POST['descrip'];
        $genre = $_POST['genree'];
        $pl_art = $_POST['p_a'];
        $playlist_song = $_POST['o'];
mysqli_query($conn,"INSERT INTO playlist(playlist_name,playlist_description,playlist_creator,playlist_genre,playlist_art,playlist_song) VALUES(' $act','$desc','$user','$genre','$pl_art','$playlist_song')");
    
    