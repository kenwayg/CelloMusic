<?php
session_start();
require_once "config/dbh.php";
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}
include ("web_services/music_like.php");
$user = $_SESSION['user'];
///recent uploads
$myquery = mysqli_query($conn , "SELECT * FROM album where alb_created > NOW() - INTERVAL 2 WEEK and alb_creator= '$user' ");
////previous month uploads 
$myquery2 = mysqli_query($conn , "SELECT * FROM album where MONTH(alb_created) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)  ");
////older than a month or two
$myquery3 = mysqli_query($conn , "SELECT * FROM album where alb_created < NOW() - INTERVAL 8 WEEK  and alb_creator= '$user'");
// $res = mysqli_fetch_assoc($myquery);

if($res){
  echo "tred";
}else{
  echo"ew";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./static/css/library.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="recent">
      <div class="header">
        <h2>Recent</h2>
      </div>
      <div class="box">
        <?php
        if (mysqli_num_rows($myquery)>0 ){
  
     

  
         
   foreach($myquery as $key){
  
        ?>
        <div class="container_mus">
          <img class="pass" src="../images/<?php echo $key['alb_image'] ?>" alt="ef" />
          <?php echo $key['alb_creator'] ?>
          <div class="like_play">
              <img
                data-id="<?php echo $key['alb_id'];?>"
                data-file="<?php echo $key['alb_music'];?>"
                class="basi"
                src="../images/play.svg"
                alt=""
              />
              <i data-id="<?php echo $key['alb_id'];?>" <?php 
              if(userLiked($key['alb_id'])):
              ?>
              class="fas fa-heart heart-active fa-2x af"
              <?php else:?>
                class="fas fa-heart heart-inactive fa-2x af"
                <?php endif ?>
              ></i>
            </div>
          <p>ered</p>

        </div>
       
        <?php }
           }else{
            echo "Omo you never upload any new track nna why? ";
           }
        ?>
      </div>
    </div>
    <div class="recent">
      <div class="header">
        <h2>Last Month</h2>
      </div>
      <div class="box">
      <?php foreach($myquery2 as $key){
        ?>
        <div class="container_mus">
          <img class="pass" src="../images/<?php echo $key['alb_image'] ?>" alt="" />
          <p>ered</p>
          <div class="like_play">
              <img
                data-id="<?php echo $key['alb_id'];?>"
                data-file="<?php echo $key['alb_music'];?>"
                class="basi"
                src="../images/play.svg"
                alt=""
              />
              <i data-id="<?php echo $key['alb_id'];?>" <?php 
              if(userLiked($key['alb_id'])):
              ?>
              class="fas fa-heart heart-active fa-2x af"
              <?php else:?>
                class="fas fa-heart heart-inactive fa-2x af"
                <?php endif ?>
              ></i>
            </div>
        </div>
      
        <?php }
        ?>
       
      </div>
    </div>
    <div class="recent">
      <div class="header">
        <h2>Oldies</h2>
      </div>
      <div class="box">
      <?php foreach($myquery3 as $key){
        ?>
        <div class="container_mus">
          <img class="pass" src="../images/<?php echo $key['alb_image'] ?>" alt="" />
          <p>ered</p>
          <div class="like_play">
              <img
                data-id="<?php echo $key['alb_id'];?>"
                data-file="<?php echo $key['alb_music'];?>"
                class="basi"
                src="../images/play.svg"
                alt=""
              />
              <i data-id="<?php echo $key['alb_id'];?>" <?php 
              if(userLiked($key['alb_id'])):
              ?>
              class="fas fa-heart heart-active fa-2x af"
              <?php else:?>
                class="fas fa-heart heart-inactive fa-2x af"
                <?php endif ?>
              ></i>
            </div>
        </div>
       
        <?php }
        ?>
      </div>
    </div>
  </body>
</html>
