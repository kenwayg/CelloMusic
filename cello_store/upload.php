<?php 
session_start();
require_once 'config/dbh.php';
if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
}
$user = $_SESSION['user'];
$mus = mysqli_query($conn,"SELECT * FROM musicians " );
$res = mysqli_fetch_assoc($mus);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>
      
 
    <title>Upload</title>
    <link rel="stylesheet" href="css/up.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend+Tera&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <h1><?php echo $user?></h1>
    <div class="wrapper">
      <div class="upload-console">
        <h2 class="upload-console-header">Upload</h2>

        <div class="upload-console-body">
          <h3>Select files from your device</h3>
          <form action="./up.php" method="POST" enctype="multipart/form-data">
            <input
              id="standard-upload-file"
              type="file"
              name="file[]"
              multiple
            />
            <button id="standard-upload" type="submit" name="submit">
              Upload
            </button>
          </form>

          <h3>Or drag and drop files below</h3>
          <div class="upload-console-drop" id="drop-zone">
            Just drag and drop files here
          </div>

          <div class="bar">
            <div class="bar-fill" id="bar-fill">
              <div class="bar-fill-text" id="bar-fill-text"></div>
            </div>
          </div>
        
          <div id="uploads-finished"   class="hidden">
            <h3>Processed files</h3>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/upload.js"></script>
    <script src="../js/global.js"></script>
  </body>
</html>
