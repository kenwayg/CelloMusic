<?php require_once "../config/dbh.php";

$language = $_POST['main_lan'];
$id = $_POST['main_id'];

$sql_update = mysqli_query($conn,"UPDATE language set lang='$language' where lang_id='$id' ");
if ($sql_update) {
 echo'Language updated';
}