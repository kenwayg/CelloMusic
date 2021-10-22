<?php 
session_start();
require_once "web_services/prof_cov.php";
require_once "web_services/user_mag.php";


if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}else{
  $sql = mysqli_query($conn, "SELECT * FROM album");
  $results = $sql;
$user = $_SESSION['user'];
$mus = mysqli_query($conn,"SELECT * FROM musicians where uidusers='$user' " );
$res = mysqli_fetch_assoc($mus);
}

////Playlist functionality




  
////MUSIC UPLOAD

if(isset($_POST['add_album'])){
  $album_lang = $_POST['alb_select'];
  $album_hero = $_POST['alb_hero'];
  $album_type = $_POST['album_type'];
  $album_name = $_POST['alb_name'];
  $album_search = $_POST['alb_key'];
  $album_creator =  $_SESSION['user'];
  // ==========================album_img
  $album_img = $_FILES['alb_img']['name'];
  $album_tmp_img = $_FILES['alb_img']['tmp_name'];

  // ............................album banner
  $album_banner = $_FILES['alb_banner']['name'];
  $album_tmp_banner = $_FILES['alb_banner']['tmp_name'];

move_uploaded_file($album_tmp_img,"../images/$album_img");
move_uploaded_file($album_tmp_banner,"../images/$album_banner");

$sql_insert =mysqli_query($conn,"INSERT into album(alb_title,alb_type,alb_lang,alb_image,alb_hero,alb_banner,alb_keywords,alb_creator) 
values('$album_name','$album_type','$album_lang','$album_img','$album_hero','$album_banner','$album_search','$album_creator')");

if($sql_insert){
  echo '<script>
  alert("album inserted");
  </script>';
}
else{
  echo mysqli_error($conn);
}
}else{
  echo "trw";
}
if(isset($_POST['ams'])){
  $sql = mysqli_query($conn, "SELECT * FROM album");
  $queryy = $sql;
}
$sql = mysqli_query($conn, "SELECT * FROM album");
$queryy = $sql;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <link rel="stylesheet" href="./style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- <link rel="stylesheet" href="../web_services/prof_cov.php" />
    <link rel="stylesheet" href="../web_services/user_mag.php" /> -->

    <!-- ////MOOzlla -->
  </head>
  <body>
    <nav>
      <?php echo $user?>
      <div id="logo">
      <h1><a href="../index.php"> Cello</a></h1>
      </div>
     
      <ul class="first_nav_links">
        <a href="#home" data-link><li>Home</li> </a>
        <a href="#stream" data-link><li> Stream</li></a>
        <a href="#library" data-link><li>Library</li> </a>
 
      <input class="inp" type="search" name="search" id="search" />
      
        <a href='#userUpload' data-link><li> Upload</li></a>
        <a href="#profile" data-link><li> Profile</li></a>
        <a href="" data-link><li>Notification</li> </a>
      </ul>
    </nav>
  
    <section>
    <div class="loading">
        <div></div>
        <div></div>
      </div>
   
 
      <div id="app">
     
      </div>
    </section>
  <div class="playbar">
  <div class="control">
  <a class="previous"><img src="./images/previous.svg" alt=""></a>

          
          <a class="glue" href="#" >
  <img  class="play-btn play" src="./images/play.svg" alt="">
  </a>
  <a class="pa" href="#" style="display: none"
            ><img src="./images/music-playerpause.png"
          /></a>
  <a class="next">
  <img src="./images/next.svg" alt="">
  </a>
  </div>
  <div class="play-control">
<p id="time">0:00</p>
<div class="track">
  <input type="range" name="playbar" id="playbar" data-time="" value="0" min="0" max="100" step="1">
<div class="animate-track"></div>  
</div>
  <p id="total-time">0:00</p>
</div>
<div class="song-info">
              <div class="images-wrapper">
              <img class="cov" src="../images/cover-art.png" />
            
            </div>
    
            <div class="tr">
            <p class="artist">Artist Name</p>
              <p class="music">Song Name</p>
            </div>
</div>

<div class="tre">

 
</div>
 <!-- The songs meta -->
<audio data-id="" data-name=""
            data-song=""
       class="aud" src="../admin/uploads/<?php echo $key['alb_music'];?>">
      </audio>
  </div>
   
    <!-- The full black bar END -->
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
   <script src="../js/jquery.js"></script>
    <script src="./app.js"></script>
    
    <!-- <script src="./yu.js"></script> -->
  
  </body>
</html>
