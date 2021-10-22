<?php
include "config/database.php";
  $user = $_SESSION['user'];
$sql_user = mysqli_query($conn, "SELECT * FROM musicians WHERE uidusers = '$user' ");
$final_result = mysqli_fetch_assoc($sql_user);

$user_id= $final_result['id'];
$user_name = $final_result['uidusers'];
//IF USER CLICKS LOVE BUTTON
if (isset($_POST['action'])) {
 $music_id = $_POST['music_id'];
 $action = $_POST['action'];

 switch($action){
     case 'like':
        $sql = "INSERT INTO music_rating (music_id, user_id, rating_action,user_name)
        VALUES($music_id, $user_id, '$action', '$user_name') ON DUPLICATE KEY UPDATE rating_action = 'like' ";
        break;
        case 'unlike':
            $sql = "DELETE FROM music_rating where user_id=$user_id AND music_id= $music_id "; 
        break;
        default:
    break;

 }
 mysqli_query($conn, $sql);
 //RETURN NUMBER OF LIKES
//  echo getRating($post_id);
 exit(0);
}
// $sql = "SELECT * FROM album";
// $result = mysqli_query($conn,$sql);
// $music_posts = mysqli_fetch_all($result,MYSQLI_ASSOC);


// //IF USER CLICKS LOVE BUTTON
// if (isset($_POST['action'])) {
//  $music_id = $_POST['music_id'];
//  $action = $_POST['action'];

//  switch($action){
//      case 'like':
//         $sql = "INSERT INTO music_rating (music_id, user_id, rating_action)
//         VALUES($music_id, $user_id, '$action') ON DUPLICATE KEY UPDATE rating_action = 'like' ";
//         break;
//         case 'unlike':
//             $sql = "DELETE FROM music_rating where user_id=$user_id AND music_id= $music_id "; 
//         break;
//         default:
//     break;

//  }
//  mysqli_query($conn, $sql);
//  //RETURN NUMBER OF LIKES
//  echo getRating($music_id);
//  exit(0);
// }

//GET THE TOTAL NUMBER OF LIKES FOR A PARTICULAR TRACK
function getRating($id){
global $conn;
$rating = array();
// $music_id = $_POST['music_id'];
$likes_query = "SELECT COUNT(*)FROM music_rating where music_id = $id and rating_action='like' ";
$likes_rs = mysqli_query($conn, $likes_query);

$likes = mysqli_fetch_array($likes_rs);
$rating = [
    'likes' => $likes[0]
];

return json_encode($rating);
}


function userLiked($e){
    global $conn;
    global $user_id;

    $sql = mysqli_query( $conn,  "SELECT * FROM music_rating WHERE user_id =$user_id 
    AND music_id=$e AND rating_action= 'like' ");
  if(mysqli_num_rows($sql) > 0){
    return true;
   
}else{
    return false;
}

}