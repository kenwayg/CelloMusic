<?php
include_once 'dbh.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="cont" class="cont">

    <?php

  $sql = mysqli_query($conn,"SELECT * FROM comments LIMIT 2");
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
  

?>
    </div>
    <button id="btn">Show more comments</button>
    <!-- <input type="text" name="name" />
    <p id="test"></p> -->
    <script src="./jquery.js "></script>
    <script src="./app.js"></script>
    <script src="./ajax.js"></script>
  </body>
</html>
