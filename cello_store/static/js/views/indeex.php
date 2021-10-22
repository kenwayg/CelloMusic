<?php
include_once 'templates/header.php';
session_start();
?>
<?php

if(isset($_COOKIE['login_msg'])){

    // echo "Welcome ".$_SESSION['user']. " " ;
    echo '<script type="text/javascript">
    setTimeout(function(){
        Swal.fire(
            "Hi! '.$_SESSION['user'].' " , "Welcome to Cello", "success"
        ); },100);
    </script>';
}
else{
    echo "";
}

?>
<!-- ===============================Grab all the user data -->
<?php


$sql_user = mysqli_query($conn, "SELECT * FROM musicians WHERE uidusers= '".$_SESSION['user']."' ");
$final_result = mysqli_fetch_assoc($sql_user);
?>

<!-- ==================================NavBar -->

<nav class="navbar navbar-expand-lg navbar-light lust">
    <div class="container">
  <a class="navbar-brand text-white" href="../index.php"><i class="fas fa-hat-cowboy-side"></i>Cello</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">All Songs <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Language
        </a>
        <div class="dropdown-menu text-white lust" aria-labelledby="navbarDropdown">
        <?php $get_langs = mysqli_query($conn,"SELECT * FROM language");
        while($fangs = mysqli_fetch_assoc($get_langs))
        :
        ?>

          <a class="dropdown-item text-white" href="language.php?id=<?php echo base64_encode($fangs['lang_id'])?>"><?php echo $fangs['lang'] ?></a>
        
          <div class="dropdown-divider text-white"></div>
         <?php endwhile ?>
        </div>
      </li>
     
    </ul>
    <!-- ================================Center content -->
    <ul class="navbar-nav mr-auto ml-auto">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 ch_length" name="search" id="search" type="search" placeholder="Search Music or Artist Name" aria-label="Search">
  <button class="btn  btn-secondary lust mr-3 my-2 my-sm-0" id="bar" type="submit  "><i class="fas fa-search"></i></button>
    </form>
    </ul>
    <!-- ===========================================Right content -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#"><i class="fas fa-bell"></i></a>
      </li>
      
      <?php
    if($final_result['acct_update'] ==0){
            echo  '<li class="nav-item dropdown text-white">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           '.$final_result['uidusers'].' 
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../upload.html"><i class="fas fa-cloud-upload-alt"></i> Upload</a>
              <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Account</a>
              <a href="../logout.php"class="dropdown-item" ><i class="fas fa-user-cog"></i> LogOut</a>
              <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item " href="#">'.$final_result['email' ].'<br><span class="badge badge-warning">Update Your Profile</span></a>
            </div>
          </li>';
    }
    else{
        echo  '<li class="nav-item dropdown text-white">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img class="profile" src="images/drake.png"> '.$final_result["uidusers"].'
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-cloud-upload-alt"></i> Upload</a>
          <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Account</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="#"> '.$final_result['email'].' <br><span class="badge badge-success">Profile is updated</span></a>
        </div>
      </li>';
    }
      ?>
     
     
    </ul>
  </div>
  </div>
</nav>

<!-- =======================jumbotron -->
<div class="container mt-5">
<div class="jumbotron">
  <h1 class="display-4">Welcome to Cello!</h1>
  <p class="lead">This is the new home for music, we at cello are lovers of good music, so you can expect only the best content in here.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg love" href="#" role="button">Explore</a>
</div>
</div>


<!-- ===============================Display Languages -->
<div class="container">
    <div class="row">
    <?php $get_langs = mysqli_query($conn,"SELECT * FROM language");
        while($fangs = mysqli_fetch_assoc($get_langs))
        :
        ?>
        <div class="col-sm-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb love">
    <li class="breadcrumb-item"><a href="#" class="text-white"><?php echo $fangs['lang'] ?></a></li>
    <li class="breadcrumb-item active text-white" aria-current="page"> <i class="fas fa-record-vinyl mt-1"></i> Albums</li>
    <li class="breadcrumb-item active text-white" aria-current="page">
    
    <?php 
        $lang_id = $fangs['lang_id'];
        $tot_count = mysqli_query($conn,"SELECT * FROM album WHERE alb_lang='$lang_id'");
    $fin_count = mysqli_num_rows($tot_count);
    echo $fin_count;
    ?>
    
    
    </li>  
    
</ol>
</nav>
</div>
<?php endwhile ?>

    </div>
</div>

<!-- =========================================Display New Albums Here in all languages -->

<div class="container mt-5">
    <h4><i class="fas fa-record-vinyl mt-1 "></i> New Album</h4>
    <?php 
    $user =  $_SESSION['user'];
        $sql_new = mysqli_query($conn,"SELECT * FROM album Where alb_creator='$user'  and alb_type='new'");
    while($result = mysqli_fetch_assoc($sql_new)) :
    
    ?>
    <hr>
    <div class="row">
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="card-img" src="../admin/images/<?php echo $result['alb_image']; ?> " alt="toosii">
                <div class="card-img-overlay text-white d-flex flex-column justify-content-center ch_back">
                    <h4><?php echo $result['alb_title']; ?></h4>
                    <h6><?php echo $result['alb_hero'] ;?></h6>
                    <div class="link d-flex">
                        <a href="" class="card-link text-white"><i class="far fa-eye"></i> / 0</a>
                        <a href="" class="card-link text-white"><i class="fas fa-cloud-download-alt"></i> / 0</a>
                        <a href="" class="card-link text-white"><i class="fas fa-music"></i> / 0</a>

                    </div>
                </div>
          
            </div>
        </div>
   
    </div>
    <?php endwhile ?>
</div>


<!-- =========================================Display Regular Albums Here in all languages -->

<div class="container mt-5">
    <h4><i class="fas fa-record-vinyl mt-1 "></i> Regular Album</h4>
    <hr>
    <div class="row">
    <?php 
        $sql_regular = mysqli_query($conn,"SELECT * FROM album Where alb_type='regular'");
    while($result = mysqli_fetch_assoc($sql_regular)) :
    
    ?>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="card-img" src="../admin/images/<?php echo $result['alb_banner']; ?>" alt="pic">
                <div class="card-img-overlay text-white d-flex flex-column justify-content-center ch_back">
                    <h4><a href="" class="text-white"><?php echo $result['alb_title'];?></a></h4>
                    <h6><?php echo $result['alb_hero'];?></h6>
                    <div class="link d-flex">
                        <a href="" class="card-link text-white"><i class="far fa-eye"></i> 0</a>
                        <!-- <a href="" class="card-link text-white"><i class="fas fa-cloud-download-alt"></i> 0</a> -->
                        <a href="" class="card-link text-white"><i class="fas fa-heart"></i> 0</a>
                        <a href="" class="card-link text-white"><i class="far fa-thumbs-up"></i> 0</a>
                        <a href="" class="card-link text-white"><i class="far fa-comment-dots"></i> 0</a>

                    </div>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Search Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body" id="search_result">
      
      </div>
     
    </div>
  </div>
</div>

<?php
require_once 'templates/footer.php';

?>