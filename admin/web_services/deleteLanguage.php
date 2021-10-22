<?php require_once "../config/dbh.php";

$delete_id = $_POST['lanId'];

$sql_del = mysqli_query($conn,"DELETE  FROM language WHERE lang_id='$delete_id'");

if ($sql_del) {
    echo 'Language deleted!';
}