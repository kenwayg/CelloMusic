<?php 
session_start();
require_once "../web_services/prof_cov.php";
require_once "../web_services/user_mag.php";
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}else{
  $sql = mysqli_query($conn, "SELECT * FROM album");
  $results = $sql;
$user = $_SESSION['user'];
$mus = mysqli_query($conn,"SELECT * FROM musicians where uidusers='$user' " );
$res = mysqli_fetch_assoc($mus);
}


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
      <h1>Cello</h1>
      <ul class="first_nav_links">
        <a href="#home" data-link>Home</a>
        <a href="#stream" data-link>Stream</a>
        <a href="/library" data-link>Library</a>
      </ul>
      <input class="inp" type="search" name="search" id="search" />
      <ul class="sec_nav_links">
        <a href="/upload" data-link>Upload</a>
        <a href="#profile" data-link>Profile</a>
        <a href="" data-link>Notification</a>
      </ul>
    </nav>
    <section>
      <div id="app">
        <p class="demo"></p>
      </div>
    </section>
    <div id="music-player">
      <!-- The full black bar -->
      <div class="inner">
        <!-- Keeping everything centered -->

        <!-- The controls -->
        <div class="controls">
          <a class="previous" href="#"><img src="images/previous.svg" /></a>
          <a class="glue" href="#"
            ><img class="play-btn play" src="images/music-playerplay.png"
          /></a>

        

          <a class="pa" href="#" style="display: none"
            ><img src="images/music-playerpause.png"
          /></a>
          <a class="next" href="#"><img src="images/next.svg" /></a>
        </div>

        <!-- The play bar -->
        <div class="play-bar">
          <span id="time">0:00</span>
          <div class="bar-bg">
            <div class="progress"></div>
          </div>
          <span id="total-time">0:00</span>
        </div>

        <div class="song-content">
          <!-- The songs meta -->

          <div class="user-info">
            <!-- The song cover -->
            <div class="images-wrapper">
              <img class="cov" src="images/cover-art.png" />
            </div>
            <!-- The artist name and song title -->
            <div class="song-info">
              <span class="artist">Artist Name</span>
              <span class="music">Song Name</span>
            </div>
          </div>

          <!-- Comment counter -->
          <div class="comment-icon">
            <a href="#">
              <img src="images/comments.svg" />
              <span>7</span>
            </a>
          </div>
        </div>
        <!-- The songs meta END -->
      </div>
      <!-- Keeping everything centered END -->
    </div>
    <!-- The full black bar END -->
    <script src="./app.js"></script>
      <script src="./js/jquery.js"></script>
    <!-- <script src="./yu.js"></script> -->
  
  </body>
</html>
