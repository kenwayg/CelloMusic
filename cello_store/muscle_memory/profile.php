<?php 
session_start();
require_once "../web_services/prof_cov.php";
require_once "../web_services/user_mag.php";
if (!isset($_SESSION['user'])) {
  header("Location: .../index.php");
}else{

$user = $_SESSION['user'];
$mus = mysqli_query($conn,"SELECT * FROM musicians where uidusers='$user' " );
$res = mysqli_fetch_assoc($mus);
}

?>
<section>
  <div class="hero">
    <img
      class="hero_image"
      src="../images/<?php echo $res['profile_header'];?>"
      alt="red"
    />
    <div class="profile_name">
      <span><?php echo $user ?></span>
    </div>
    <div class="user_img">
      <img src="../images/<?php echo $res['profile_img']?>" alt="" />
      <form method="post" class="upload_image" enctype="multipart/form-data">
        <button class="td" name="image_up" type="submit">Upload Image</button>
        <input name="profile_image" class="profile_image" type="file" />
        <div class="modal" id="modal_section">
          <span class="closeBtn">&times;</span>
          <div class="modal_content">
            refd
            <p class="para"></p>

            <button type="submit" name="mod_btn" class="mod_btn">Save</button>
          </div>
        </div>
      </form>
    </div>
    <form method="post" class="upload_header" enctype="multipart/form-data">
      <button type="submit" class="slu">Upload header image</button>
      <input name="profile_header" class="profile_header" type="file" />
      <div class="modal2" id="modal_section2">
        <span class="closeBtn2">&times;</span>
        <div class="modal_content2">
          refd
          <p class="para2"></p>

          <button name="header" type="submit" name="mod_btn2" class="mod_btn2">
            Save
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="library">
    <div class="ul">
      <ul class="list">
        <a href=""><li>All</li></a>
        <a href=""><li>Famous tracks</li></a>
        <a href=""><li>Songs</li></a>
        <a href=""><li>Albums</li></a>
        <a href=""><li>Playlist</li></a>
        <a href=""><li>Liked</li></a>
      </ul>
      <hr />
    </div>
    <div class="editablw">
      <div class="music_section"></div>
      <div class="follower_side"></div>
    </div>
    <button class="btn">cjdu</button>
    <div class="upload_note">
      <p class="note">You hear that frog sound?</p>
      <a href=""> Me too, so why not upload a track and share with the world</a>
      <br />
      <button>Upload now</button>
      <button class="wr">wdda</button>
    </div>
  </div>
</section>
