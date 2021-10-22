<?php

require_once "./config/dbh.php";
$user =  $_SESSION['user'];

if(!isset($_POST['header'])){

}
else{
    $header_img = $_FILES['profile_header']['name'];
    $header_tmp_img = $_FILES['profile_header']['tmp_name'];
  
    move_uploaded_file($header_tmp_img,"../images/$header_img");
    $sql_sert = mysqli_query($conn,"UPDATE musicians set profile_header='$header_img' where uidusers='$user'");


}



?>