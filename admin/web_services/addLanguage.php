<?php
header('Content-Type: application/json');
require_once "../config/dbh.php";
?>

<?php

$new_lang = $_POST['lang'];

$sql_lang =  mysqli_query($conn,"INSERT INTO language(lang) VALUES('$new_lang')");

if ($sql_lang) {
$response_array['status'] = 'success';

} else {
    $response_array['status'] = 'fail';
}

echo json_encode($response_array);
