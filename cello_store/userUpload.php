<?php
require_once "../config/database.php";
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./static/css/cello.css" />

  <title>Document</title>
</head>
<body>
  

<!-- ================================album adding section -->

<div class="ye">
<div class="container">
<div class="row">

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
  
  
</form>


</div>
</div>


<div class="next">
  <a href="upload.php" ><button type="submit" class="ter lust">Next Page</button></a>
</div>









</body>
</html>