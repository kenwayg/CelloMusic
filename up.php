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
  
  
  

 if (in_array($ext, $allowed) && move_uploaded_file($temp, 'admin/uploads/' . $file)) {
  // $sql_in = mysqli_query($conn,"INSERT INTO album  (alb_creator) values ( '$user') ");
// $alb_creator = $user;
  $sql_in = mysqli_query($conn,"UPDATE album SET alb_music='$file' where alb_creator='$user' and alb_music='' ");
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

  
$eric = $processed;

// play[i].onclick = function (ev) {
//   let swicc = play[i].getAttribute("data-switch");
//   console.log(swicc);

//   ap.list.switch(swicc);
//   ap.play();
// };
// }

// const ap = new APlayer({
// container: document.getElementById("aplayer"),
// folded: true,
// audio: [
//   {
//     name: "name",
//     artist: "artist",
//     url: song[1].src,
//     cover: "cover.jpg",
//   },
//   {
//     name: "name",
//     artist: "artist",
//     url: song[2].src,
//     cover: "cover.jpg",
//   },
//   {
//     name: "name",
//     artist: "artist",
//     url: song[3].src,
//     cover: "cover.jpg",
//   },
//   {
//     name: "name",
//     artist: "artist",
//     url: song[4].src,
//     cover: "cover.jpg",
//   },
//   {
//     name: "name",
//     artist: "artist",
//     url: song[5].src,
//     cover: "cover.jpg",
//   },
// ],
// });


// const ui = document.querySelectorAll(".play");
// function init() {
//   for (let i = 0; i < ui.length; i++) {
//     let play = document.querySelectorAll("#player[data-file]");
//     ui[i].onclick = player;
//   }
// }
// function player(ev) {
//   let p = ev.target;
//   ev.preventDefault();
//   let fn = p.getAttribute("data-file");
//   let src = "./admin/uploads/" + fn;
//   console.log(src);
//   let song = document.querySelector("#songs");
//   song.src = src;

//   song.play();
//   console.log(song);
// }
