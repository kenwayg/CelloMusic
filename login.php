<?php
include_once "templates/header.php";
?>
   
<!-- =======================LOGIN -->

<?php

  if(isset($_POST['login_btn'])){
    $user_mail = $_POST[ 'email' ];
    $user_pwd = $_POST['pwd'];

    $result = mysqli_query($conn,"SELECT * FROM musicians WHERE email = '$user_mail ' AND pwd = '$user_pwd ' ");
    if(mysqli_num_rows($result)>0){
      $sql_update = mysqli_query($conn,"UPDATE musicians SET error_count=0 WHERE email='$user_mail ' ");
   $user_dets = mysqli_fetch_assoc($result);

   if($user_dets['role']=="user"){
          if ($user_dets['acct_verify']== 1) {
            session_start();
            $_SESSION['user'] = $user_dets['uidusers']; 
         $users = $_SESSION['user'];
           setcookie("login_msg",$users, time()+(10));
           header("Location: cello_store/index.php
           ");
          //  

          } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            <strong>WARNING!</strong> Please verify your Cello account.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          }
          
        }
        elseif ($user_dets['role']=="admin") {
          session_start();
          $_SESSION['user'] = $user_dets['uidusers']; 
          header("Location:admin/index.php");

        }
    }
    else{
      // ......................three times password error count
      $sql_update = mysqli_query($conn,"UPDATE musicians SET error_count=error_count+1 WHERE email='$user_mail ' ");
     $sql_all = mysqli_query($conn,"SELECT * FROM musicians WHERE email= '$user_mail '");
      $finalResult = mysqli_fetch_assoc($sql_all);
      if ($finalResult['error_count'] == 1) {
        $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        <strong>WARNING!</strong> You have only 2 attempts left!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      elseif ($finalResult['error_count'] == 2) {
        $msg ='<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        <strong>WARNING!</strong> You have 1 attempt left, next fail and your account will be deleted!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      else if($finalResult['error_count']==3){
        $sql_delete = mysqli_query($conn, "DELETE FROM musicians WHERE email = '$user_mail'");
        $msg ='<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        <strong>WARNING!</strong> Your account has been deleted, please register once.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      else{
        $msg ='<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        <strong>WARNING!</strong> Incorrect login details
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
  }
  

?>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-5">
      
        </div>
        <div class="col-sm-3 ch_position">
          <h3 mb-3 ch-bold><i class="fas fa-hat-cowboy-side"></i>   Login To Cello</h3>
        <form method="post">
  <div class="form-group">
 
    <input type="email" class="form-control" id="loginEmail" name="email" aria-describedby="emailHelp"  placeholder="Enter email">
   <small id="emailHelp" class="form-text text-muted"> <i class="fas fa-lock"></i> We'll never share your email with anyone else.</small>
  <span id="login_email_error"></span>
  </div>
  <div class="form-group">
   
    <input type="password" class="form-control" name="pwd" id="loginPass" placeholder="Password">
    <span id="login_pwd_error"></span>
  </div> 
  <button type="submit" id="login_btn" name="login_btn" class="btn lust btn-block">Submit</button>
</form>
<span class="float-left mt-1"><a href="javascript:void(0)" data-toggle="modal" data-target="#register"> New To Here? </a></span>
<span class="float-right mt-1"> <a href="javascript:void(0)" data-toggle="modal" data-target="#forgot"> Forgot Password</a></span>
     <?php echo @$msg; ?>
        </div>

        <div class="col-sm-5">
           
        </div>
    </div>
</div>

     <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reg"><i class="fas fa-hat-cowboy-side"></i>    Register To Cello</h5>
        <button type="button" id="modal_close" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="container">
     <form id="registerf">
     <div class="form-group">
 
 <input type="text" class="form-control" id="uname"  name="uidusers"  placeholder="Enter Name">
 <span id="nameError" class=" ch_error"></span>
</div>

  <div class="form-group">
 
            <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp"  placeholder="Enter email">
            <span id="emailError" class=" ch_error"></span>
        </div>
        
        <div class="form-group">
          <input type="password" class="form-control" name="pwd" id="pwd" name="pwd" placeholder="Password">
          <span id="passError" class=" ch_error"></span>
        </div>
       
</form>
     </div>
      </div>
      <div class="modal-footer">
      <p class="ch-left" id="msg"></p>
        <button type="button" class="btn love" id="verify_Ajax">Register</button>
   
        <button class="btn love" type="button" disabled id="snipper">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
Please Wait....
</button>
      </div>
    </div>
  </div>
</div>


<!-- Forgot modal -->

<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Forgot Password</h5>
        <button type   ="button" class="close" data-dismiss="modal" aria-label="Close" id="verify_pass_modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="container">
     <form id="forgot_pass">
  <div class="form-group">
 
            <input type="email" class="form-control" id="verify_email" name="verify_email" aria-describedby="emailHelp"  placeholder="Enter email">
            <span id="emailError1" class=" ch_error"></span>
        </div>

        <div class="form-group"  id="pass_filled">
        
            <input type="password" class="form-control" name="forgot_pwd" id="forgot_pwd" placeholder="Enter New Password">
            <span id="passError1" class=" ch_error"></span>
        </div>
</form>
     </div>
      </div>
      <div class="modal-footer">
      <p class="ch-left" id="msg1"></p>
        <button type="button" class="btn love" id="email_verify">Verify Email</button>
        <button type="button" class="btn love" id="pass_chan">Change Password</button>
      </div>
    </div>
  </div>
</div>




    <?php
include_once "templates/footer.php";
?>