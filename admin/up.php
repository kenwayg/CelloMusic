<?php
session_start();
header('Content-Type: application/json');

require_once 'config/database.php';
$allowed = ['mp3', 'wav', 'jpeg', 'jpg', ];
$processed = [];
$user = $_SESSION['user'];
foreach ($_FILES ['file']['name']as $key => $name) {
  if($_FILES['file']['error'] [$key] === 0){

    // echo 'great';
 $temp = $_FILES['file'] ['tmp_name'] [$key];

 $ext = explode('.', $name);
 $ext = strtolower(end($ext));

  $file =  uniqid('', true) . time() . '.' . $ext ;



 if (in_array($ext, $allowed) && move_uploaded_file($temp, 'uploads/' . $file)) {

  $sql_in = mysqli_query($conn,"UPDATE album SET alb_title='er' WHERE alb_id=21");

    $processed[] = array(
        'name' => $name,
        'file' => $file,
        // 'file' => $user,
        'uploaded' => true 
    

    );
    
    
  } else {
   $processed[] = array(
     'name' => $name,
     'uploaded' => false
   );
   }

 }


  }

  echo json_encode($processed);

  
  // $sql_in = mysqli_query($conn,"UPDATE album SET alb_music='$file' where alb_creator='$user'");
  //  if($sql_in){
  //     echo 'great';
  //  }
  
  //  $sql_in = mysqli_query($conn,"INSERT INTO album (alb_music,alb_creator)
  //       values('$file', '$user')");
  //  if($sql_in){
  //     echo 'great';
  //  }