<?php
include_once "../config/dbh.php";

$search = $_POST['main_key'];
$sql_search_result = mysqli_query($conn,"SELECT * FROM album WHERE alb_keywords LIKE '$search%'");

if (mysqli_num_rows($sql_search_result)>0) {
    while($main_result = mysqli_fetch_assoc($sql_search_result)){
            echo '<img src="../admin/images/'.$main_result['alb_image'].' " height="50px" width="50px"> &nbsp &nbsp <a href="" class="lust">'.$main_result['alb_title'].' </a>';
            echo '<br><hr>';
    }
   
} else {
    echo '<p class="text-danger">No search result found </p>';
}
