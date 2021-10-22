<?php 
require_once "templates/header.php";?>

<?php
if(isset($_GET['id'])){
       $user_email= base64_decode(($_GET['id']));
$sql_update_account = mysqli_query($conn," UPDATE musicians SET acct_verify=1 WHERE  email = '$user_email' ");
$succ_msg = $user_email. " Account is verified";

}
else{
    header("Location: index.php");
}

?>
<div class="contaiiner text-center">
<div class="row">
<div class="col-sm-5"></div>
<div class="col-sm-3 ch_position">
<h4><?php echo $succ_msg; ?></h4>
<a href="index.php"><button class="btn lust">Login Here</button></a>
</div>
<div class="col-sm-5"></div>
</div>
</div>

<?php
require_once 'templates/footer.php'?>