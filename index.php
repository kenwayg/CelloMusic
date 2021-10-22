<?php
// include_once "cello_store/templates/header.php";
//Only report fatal errors and parse errors.
// error_reporting(E_ERROR | E_PARSE);
 
//This will usually create a division by 0 
//warning message.
// echo 1 / 0;
 
//This will usually create an array to string
//notice message.
// echo array();
session_start();
include_once "config/database.php";

$sql_query = mysqli_query($conn,"SELECT * FROM album " );
$results = $sql_query;
$mus = mysqli_query($conn,"SELECT * FROM musicians " );
$res = mysqli_fetch_assoc($mus);
$user = "";


// $user = $_SESSION['user'];
// require("functions.php");



?>
 <!DOCTYPE  html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
   
    <!-- <link rel="stylesheet" href="./css/style.css" /> -->
    <!-- <link rel="stylesheet" href="./css/red.css"> -->
    <link rel="stylesheet" href="gre.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  </head>
  <!-- ldlld? -->
  <body>
      <?php
  

    if( !isset($_SESSION['user'])){

     
      
    
        echo 'You are not logged in';
        echo '  <header>
        <nav class="lust">
          <ul class="nav-links">
          <a href=""class="cello"><li><i class="fas fa-hat-cowboy-side"></i>Cello</li></a>
            <a href="./login.php"
              ><li>Sign in <i class="fas fa-sign-in-alt"></i></li
            ></a>
            <a href=""
              ><li><i class="fas fa-cloud-upload-alt"></i>Upload</li></a
            >
          </ul>
        </nav>
      </header>';
      echo ' <section class="hero-container">
      <div class="hero">
    
        <h4>Welcome To Cello the new home of music</h4>
        <button type="submit">Connect</button>
      </div>
    </section>';
    }
    else{
     
      $user = $_SESSION['user'];
    
      include ("web_services/music_like.php");
      // include_once 'getdata.php';
      // $results = $prod->getData();
      // $rest = $prod->getGall();
  
      $sql_user = mysqli_query($conn, "SELECT * FROM musicians WHERE uidusers= '$user' ");
      $final_result = mysqli_fetch_assoc($sql_user);
        echo 'You are logged in';
      echo '  <header>
      <nav class="lust">
        <ul class="nav-links">
        <a href=""class="cello"><li><i class="fas fa-hat-cowboy-side"></i>Cello</li></a>
        <div class="dropdown">
          <a href=""><li>  
          '.$final_result['uidusers'].'<i class=" fas fa-caret-down"></i></li>
          
          </a>
          <div class="dropdown-content">
          <a href="cello_store/index.php" class="se">Profile</a>
          <a href="logout.php" class="se">LogOut</a>
          </div>
          </div>
          
         
     
          <a href="userUpload.php"><li><i class="fas fa-cloud-upload-alt"></i>Upload</li></a
          >
        </ul>
      </nav>
    </header>';
    echo ' <section class="hero-container">
    <div class="hero">
      <h4>Welcome To Cello the new home of music</h4>
     <a href="userUpload.php" ><button type="submit">Upload</button></a>
    </div>
  </section>';
      }

?>

    <main>
      <div class="search">
        <input
          class=""
          type="search"
          name="search"
          id="search"
          placeholder="Enter Artist, Album or Song Name"
        />
        <i class="honest-search fas fa-search"></i>
      </div>
    </main>
    <section>
      <div class="sec-head">
        <h2>Recents</h2>
        <hr />
      </div>
     
      <div class="flex-container ew">
        
 
      <?php
        if($user){
      foreach($results as $key){ ?> 
  <div class="click"  id="<?php echo $key['alb_id'];?>">

  <img   class="play climg ch_black"  id="<?php echo $key['alb_id'];?>"  src="./images/<?php echo $key['alb_image']; ?>"  alt="gemi" />
   
  <div class="play_foot">
    <div class="song_name"><?php
    echo  $key['alb_title'];
    ?></div>
    <div class="artist">
    <?php
     echo  $key['alb_hero'];
      ?>
    </div>
    </div>
    <div class="like_play">
  
    <img id="<?php echo $key['alb_id'];?>" data-file="<?php echo $key['alb_music'];?>" class="basi" src="./images/play.svg" alt="">
    <i  data-id="<?php echo $key['alb_id']?>"  <?php
  if(userLiked($key['alb_id'])):  ?>
   class="fas fa-heart heart-active fa-2x af"
    <?php else : ?>
      class="fas fa-heart heart-inactive fa-2x af"
       <?php endif ?>></i>
       
     
      
    </div>
   

</div>
 <?php };
    }else {
      foreach($results as $key){ ?> 
        <div class="click"  id="<?php echo $key['alb_id'];?>">
      
        <img   class="play climg ch_black"  id="<?php echo $key['alb_id'];?>"  src="./images/<?php echo $key['alb_image']; ?>"  alt="gemi" />
         
        <div class="play_foot">
          <div class="song_name"><?php
          echo  $key['alb_title'];
          ?></div>
          <div class="artist">
          <?php
           echo  $key['alb_hero'];
            ?>
          </div>
          </div>
          <div class="like_play">
        
          <img id="<?php echo $key['alb_id'];?>" data-file="<?php echo $key['alb_music'];?>" class="basi" src="./images/play.svg" alt="">
       <i  data-id="<?php echo $key['alb_id'] ?>"  
            class="fas fa-heart heart-inactive fa-2x af" onclick="back()">
          </i>
         
          </div>
      </div>
      <?php
     };
     }
  ?> 

      </div>

      <div>
    
<!-- <audio src="" id="songs" class=""></audio> -->
    
    </section>
   
    <!-- <audio class="song" id="songs" src="" > -->
       
       <!-- </audio> -->
    <div id="aplayer"></div>
    <section>
      <div class="new-discover"></div>
    </section>
    <div class="play">
      <img id="play"   class="play" src="images/janelle.png" alt="" >
    
    </div>
   
    <a class="fas fa-like-btn" href=""></a>
    <div id="music-player">
      <!-- The full black bar -->
      <div class="inner">
        <!-- Keeping everything centered -->

        <!-- The controls -->
        <div class="controls">
          <a class="previous" href="#"><img src="images/previous.svg" /></a>
          <a  class="glue" href="#"><img class="play-btn play" src="images/music-playerplay.png" /></a>

     <audio class="aud" src="./admin/uploads/<?php echo $key['alb_music'];?>">
      </audio>
         
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

    <footer class="lust">
  <div class="footer-content">
  <div class="footer-section about">
  <h1 class="logo-text">
  <span>Cello</span>Music</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis delectus vitae debitis tenetur mollitia.</p>
  <div class="contact">
  <span><i class="fas fa-phone"></i>&nbsp; 123-456-789</span>
  <span><i class="fas fa-envelope"></i>&nbsp; info@cello.com</span>

  </div>
<div class="socials">
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
&copy; Cello Music 2020-<?php echo date("Y");?>
  </div>
  <div class="footer-section links">
  <h2>Quick Links</h2>
  <br>
  <ul>
  <a href=""><li>Events</li></a>
  <a href=""><li>Team</li></a>
  <a href=""><li>Mentors</li></a>
  <a href=""><li>Gallery</li></a>
  <a href=""><li>Terms and Conditions</li></a></ul>
  </div>
  <div class="footer-section contact-form">
  <h2>Contact us</h2>
  <br>
  <form action="" method="post">
  <input type="email" name="email" id="mail" class="contact-input" placeholder="Your email address"><br>
  <textarea name="message" class="contact-input" placeholder="Your message..."></textarea><br>
  <button type="submit" class="btn-sub"><i class="fas fa-envelope"></i> Submit</button>
  
  </form>
  </div>
  </div>
  <div class="footer-bottom">
   
  </div>
    
    </footer>
    <script src="./js/jquery.js"></script>
    <script src="yu.js"></script>
  
      
  </body>
<!-- </html> -->
