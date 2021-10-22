<?php
include_once 'templates/header.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./index.php");
}
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

move_uploaded_file($album_tmp_img,"images/$album_img");
move_uploaded_file($album_tmp_banner,"images/$album_banner");

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
}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Operation
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#add_lang">Add Language</a>
          <a class="dropdown-item" href="album.php">Add Album</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Add Mp3</a>
        </div>
      </li>
       
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['user']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Logout</a>
</div>
</li>
    </ul>
 
  </div>
  </div>
</nav>

<!-- ===================================Language banner box -->

<div class="container yu mt-5 mb-5 lust ch_relative">
<h3 class="ch_absolute">Album Section</h3>
</div>

<!-- ================================album adding section -->
<div class="container">
<div class="row">


<div class="col-sm-6">
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleFormControlSelect1">Select Language</label>
    <select class="alb_select" id="alb_select" name="alb_select">
      <option value="0">---Select Language---</option>
      <?php $get_langs = mysqli_query($conn,"SELECT * FROM language");
        while($fangs = mysqli_fetch_assoc($get_langs))
        :
        ?>
        <option value="<?php echo $fangs['lang_id'];?>"><?php echo $fangs['lang'];?></option>
        <?php endwhile ?>
    </select>
  </div>
  <!-- .............................................................album hero -->
  

  <div class="form-group">
    <label for="alb_hero">Album Hero Name</label>
    <input type="text" class="alb_hero" id="alb_hero"name="alb_hero" placeholder="Enter Album Name">
  </div>

  <!-- =======================album type -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Album Type</label>
    <select class="album_type" id="album_type" name="album_type">
    <option value="0" >----Select Here</option>
    <option value="new" >New</option>
    <option value="regular">Regular</option>
    </select>
    </div>
  <!-- .......................................album img -->
  <div class="form-group">
    <label for="alb_imag">Album Image</label>
    <input type="file" name="alb_img" class="alb_imag" id="alb_imag">
  </div>
  </div>
<div class="col-sm-6">
  
<!-- .....................................album name -->
<div class="form-group">
            <label for="alb_name">Album Name</label>
            <input type="text" class="alb_name" id="alb_name" name="alb_name" placeholder="Enter Album Name">
        </div>
   <!-- ........................................album keywords -->
        <div class="form-group">
            <label for="alb_key">Album Keywords</label>
            <textarea class="alb_key" id="alb_key" name="alb_key" rows="3"></textarea>
        </div>

        <!-- .......................................................album banner -->
        <div class="form-group">
    <label for="alb_banner">Album Banner</label>
    <input type="file" class="alb_banner" id="alb_banner" name="alb_banner">
  </div>

  <!-- .....................................album button -->
  <div class="form-group">
  <button type="submit" name="add_album" class="btn-block love">Add Album</button>
  </div>
  </div>
</form>
</div>
</div>


<div class="next">
  <a href="upload.php"><button type="submit">Next Page</button></a>
</div>










<?php
include_once 'templates/footer.php';

?>