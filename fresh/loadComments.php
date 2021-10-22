<?php
include_once 'dbh.php';

$commNewCount = $_POST['commNewCount'];
  $sql = mysqli_query($conn,"SELECT * FROM comments LIMIT $commNewCount ");
  $result = $sql;
  if (mysqli_num_rows($result)>0) {
    while($row = mysqli_fetch_assoc($result)){
      echo "<p>";
      echo $row['author'].':';
      echo "<br>";
      echo $row['messages'];
      echo "</p>";
    }
  } else {
   echo 'There are no comments';
  }
  
