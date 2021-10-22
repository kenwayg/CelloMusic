<?php
session_start();
require_once "../config/dbh.php";

$sql = mysqli_query($conn, "SELECT * FROM album");
$results = $sql;
$user = $_SESSION['user'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./home.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
  </head>

  <body>
    <section class="muse">
      <div id="new">
        <div class="head"><h1>New Shit</h1></div>
        <hr />
        <div class="boxes">
          <!-- start of loop -->
          <?php foreach ($results as $key) {
         ?>
          <div class="first">
            <img src="./images/<?php
            echo $key['alb_image'];
            
            ?>" alt="yet"/>
            <div class="like_play">
              <img
                id="<?php echo $key['alb_id'];?>"
                data-file="<?php echo $key['alb_music'];?>"
                class="basi"
                src="./play.svg"
                alt=""
              />
              <i class="fas fa-heart heart-active fa-2x af"></i>
            </div>
            <span>Name of artist</span>
            <span>name of song</span>
          </div>
          <?php    
          }?>
          <!-- end of loop -->
          </div>
          </div>
          <audio
            class="aud"
            src=''
          ></audio>
    </section>
  </body>
</html>
r
