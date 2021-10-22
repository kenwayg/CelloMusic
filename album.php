<?php
include_once 'templates/header.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./index.php");
}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Operation
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#add_lang">Add Language</a>
          <a class="dropdown-item" href="album.php">Add Album</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Add Mp3</a>
        </div>
      </li>
       
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['user']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Logout</a>
</div>
</li>
    </ul>
 
  </div>
  </div>
</nav>

<!-- ===================================Language banner box -->

<div class="container yu mt-5 mb-5 lust ch_relative">
<h3 class="ch_absolute">Language Section</h3>
</div>

<!-- ================================lanhuage adding section -->
<div class="container">
    <div class="row">
        <div class="col-sm-4" id="add_lang">
            <h4>Add Language</h4>
            <hr>
            <form action="" id="lang_form">
            <label for="lang">Add New Language</label>
            <input type="text"  name="lang" id="language" class="form-control" placeholder="Enter the language"><br>
            </form>
            <button type="submit" id="lang_btn" class="lust">Submit</button>
        </div>
        <div class="col-sm-4" id="update_lang">
            <h4 id="update_form">Update Language</h4>
            
        </div>
        <div class="col-sm-8">
                        <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">s/n</th>
                    <th scope="col">Language</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="lang_data">
                    
                </tbody>
                </table>

        </div>
    </div>
</div>




















<?php
include_once 'templates/footer.php';

?>