<?php
header('Content-Type: application/json');
require_once "../config/dbh.php";
?>

<?php

$user_email = $_POST['verify_email'];

$sql_verify =  mysqli_query($conn,"SELECT * FROM musicians WHERE email = '$user_email '");

if (mysqli_num_rows($sql_verify)>0) {
$response_array['status'] = 'success';

} else {
    $response_array['status'] = 'fail';
}

echo json_encode($response_array);
