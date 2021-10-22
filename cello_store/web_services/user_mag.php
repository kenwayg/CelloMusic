<?php
include_once "./config/dbh.php";
$user =  $_SESSION['user'];
if (isset($_POST['mod_btn'])) {
   $prof_img = $_FILES['profile_image']['name'];
$prof_img_tmp = $_FILES["profile_image"]['tmp_name'];
move_uploaded_file($prof_img_tmp,"../images/$prof_img");
$sql = mysqli_query($conn,"UPDATE musicians SET profile_img='$prof_img' where uidusers='$user' ");
if($sql){
    echo "
    <script>
    alert('Image Uploaded');
    </script>
    ";
}
}