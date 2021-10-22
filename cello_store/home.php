<?php
session_start();
// require_once "./config/dbh.php";
include ("web_services/music_like.php");
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}
$sql = mysqli_query($conn, "SELECT * FROM album");
$results = $sql;
$user = $_SESSION['user'];
$sql = mysqli_query($conn, "SELECT * FROM album");
$queryy = $sql;

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
              <form method="post"  class="playlist_add"  enctype="multipart/form-data">
      
      <!-- <input name="playlist_header" class="playlist_header" type="file" /> -->

      <div class="modal" id="modal_section">
  <span class="closeBtn">&times;</span>
    <div class="modal_content">
  
      <div class="fill">
    <label class="lbl" for="Playlist_name">Name</label>
      <input type="text" placeholder="Untitled Playlist" name="playlist_name"  value="" class="pl_name">
      <br>
      <label class="lbl"
       for="Playlist_description">Description</label>
      <input type="text" placeholder="Add Description" name="playlist_description" class="descrip">      <br>
      <label class="lbl"
       for="Playlist_cover">Playlist Cover</label>
       <input type="hidden" value="" class="unk" name="unk">
      <input type="file" name="playlist_art" class="play_art">      <br>
      <select name="genre" class="play_genre"  value="">
      <option value="Select">Select genre</option>
      <option value="Hip Hop/Rap">Hip Hop/Rap</option>
      <option value="Soul">Soul</option>
      <option value="R n B">R n B</option>
      </select>
            

      <button name="ams" class="ams">Add More songs</button>
           <input type="hidden" class="check_song"  name="check_song" value="">
           <input type="hdiden" class="desk_song"   value="">
           <input type="hdiden" class="des_gen"   value="">
           <!-- <input type="hdiden" class="che_song"   value=""> -->
      <div class="scrooge">
      <?php
     
      
      foreach ($queryy as $rey) { 
      # code...
     
   ?>
 
     <div class="more_songs"  data-file= "<?php  echo $rey['alb_music']; ?>">
                 <span >   <?php  echo $rey['alb_title']; ?></span> <button type="submit"  class="gun" value="">Add to playlist</button>
              </div>
  <?php } ?>
  </div>
      </div>
  <!-- <button name="header" type="submit" name ="mod_btn" class="mod_btn">Save</button> -->
  <button type="submit" name="subn" class="sl">Add Up</button>
</div>
  </div>
</form>
          <div class="first">
            <img  data-name="<?php echo $key['alb_hero'];?>"
            data-song="<?php echo $key['alb_title'];?>"
             class="pass" src="../images/<?php
            echo $key['alb_image'];
   
            ?>" alt="yet"/>
            <div class="like_play">
              <img
                data-id="<?php echo $key['alb_id'];?>"
                data-file="<?php echo $key['alb_music'];?>"
                class="basi"
                src="../images/play.svg"
                alt=""
              />
             <!-- <img src="./tre/more.svg" alt="" class="more"> -->
             <div class="dropdown">
            <svg class="more" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
<g><path d="M126.4,383.6C65.1,383.6,10,438.8,10,500c0,61.2,55.1,116.4,116.4,116.4c67.4,0,116.4-55.1,116.4-116.4C242.8,438.8,193.8,383.6,126.4,383.6z M500,383.6c-67.4,0-116.4,55.1-116.4,116.4c0,61.2,55.1,116.4,116.4,116.4S616.4,561.3,616.4,500C616.4,438.8,567.4,383.6,500,383.6z M873.6,383.6c-67.4,0-116.4,55.1-116.4,116.4c0,61.2,55.1,116.4,116.4,116.4S990,561.3,990,500C990,438.8,934.9,383.6,873.6,383.6z"/></g>
          </svg>
         <div class="dropdown-content">
         <svg class="addPlay" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
<g><path d="M920,428.9l70,70L664.1,827L451.9,617l70-70l142.2,140L920,428.9z M10,638.9V547h371.9v91.9H10z M570,173v94.1H10V173H570z M570,358.9V453H10v-94.1H570z"/></g>
</svg> Add to playlist
         <a href="#"><svg  class="share" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
<g><path d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M356.9,464.6c31.6-42.9,74.5-67.8,101.6-74.5c0,0,42.3-20.3,73.1-22.6c30.8-2.3,66.9-6.8,66.9-6.8L548.7,302v-20.3l27.1-22.6l155.8,133.2v13.5l-22.6,22.6L575.8,541.3c0,0-49.7-9-24.8-40.6c24.8-31.6,45.1-51.9,45.1-51.9s-70-13.5-110.6,2.2c-40.6,15.8-97.1,47.4-108.4,90.3c-11.3,42.9-11.3,42.9-11.3,42.9l-15.8,20.4L332,593.3v-22.6C332,570.7,325.2,507.5,356.9,464.6z M736.5,697.2H326.6v-44.1h364.1v-91.4h45.8V697.2z"/></g>
</svg> Share</a>

         <a href="#">Station</a>
         </div>
          
          </div>
     
              <i data-id="<?php echo $key['alb_id'];?>" <?php 
              if(userLiked($key['alb_id'])):
              ?>
              class="fas fa-heart heart-active  af"
              <?php else:?>
                class="fas fa-heart heart-inactive  af"
                <?php endif ?>
              ></i>
            </div>
            <div class="j">
            <span><?php echo $key['alb_hero'];?></span>
            <span><?php echo $key['alb_title'];?></span>
            </div>
          </div>
          <?php    
          }?>
          <!-- end of loop -->
          </div>
          </div>
       
  
    </section>
  </body>
</html>

