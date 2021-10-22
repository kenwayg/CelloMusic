<?php
if(isset($_POST['ad_album'])){
  echo '<script>
  alert("song is live!");
  </script>';
  header("Location: ./index.php");
}else{
  echo '<script>
  alert("album insert");
  </script>';
}

?>