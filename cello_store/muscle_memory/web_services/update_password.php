<?php
header('Content-Type: application/json');
require_once "../config/dbh.php";

$user_email = $_POST['verify_email'];
$user_pass = $_POST['forgot_pwd'];

$sql_update = mysqli_query($conn,"UPDATE  musicians SET pwd = '$user_pass ' WHERE email = '$user_email ' ");
if($sql_update){
    $response_array['status'] = "success";
}
else{
    $response_array['status'] = "fail";

    
}
echo json_encode($response_array);