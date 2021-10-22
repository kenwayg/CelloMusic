<?php
header('Content-Type: application/json');
require_once "../config/dbh.php";

$user = $_POST['uidusers'];
$email = $_POST['email'];
$pass = $_POST['pwd'];
$subject = '<a href="http://localhost/cello/verify.php?id=' .base64_encode($email).'">Click here to activate your cello account</a>';

$sql_verify = mysqli_query($conn,"SELECT * FROM musicians WHERE email='$email' " );

if (mysqli_num_rows($sql_verify)>0) {
 $response_array["status"]="fail";
} else {


   date_default_timezone_set('Etc/UTC');

   require '../phpmailer/PHPMailerAutoload.php';
   
   //Create a new PHPMailer instance
   $mail = new PHPMailer;
   
   //Tell PHPMailer to use SMTP
   $mail->isSMTP();
   
   //Enable SMTP debugging
   // 0 = off (for production use)
   // 1 = client messages
   // 2 = client and server messages
   $mail->SMTPDebug = 0;
   
   //Ask for HTML-friendly debug output
   $mail->Debugoutput = 'html';
   
   //Set the hostname of the mail server
   $mail->Host = 'smtp.gmail.com';
   // use
   // $mail->Host = gethostbyname('smtp.gmail.com');
   // if your network does not support SMTP over IPv6
   
   //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
   $mail->Port = 587;
   
   //Set the encryption system to use - ssl (deprecated) or tls
   $mail->SMTPSecure = 'tls';
   
   //Whether to use SMTP authentication
   $mail->SMTPAuth = true;
   
   //Username to use for SMTP authentication - use full email address for gmail
   $mail->Username = "cellomusical22@gmail.com";
   
   //Password to use for SMTP authentication
   $mail->Password = "celloGames1";
   
   //Set who the message is to be sent from
   $mail->setFrom('cellomusical22@gmail.com', 'Cello');
   
   //Set an alternative reply-to address
   $mail->addReplyTo('no-replyto@example.com', '');
   
   //Set who the message is to be sent to
   $mail->addAddress($email, $user);
   
   //Set the subject line
   $mail->Subject = 'Confirmation Of Email';
   
   //Read an HTML message body from an external file, convert referenced images to embedded,
   //convert HTML into a basic plain-text alternative body
   $mail->msgHTML('<!DOCTYPE html><html><body>"'.$subject.'"</body></html>');
   
   //Replace the plain text body with one created manually
   $mail->AltBody = 'This is a plain-text message body';
   
   //Attach an image file
   //$mail->addAttachment('images/phpmailer_mini.png');
   
   //send the message, check for errors
   if ($mail->send()) {
       //echo "Mailer Error: " . $mail->ErrorInfo;
       $sql_insert = mysqli_query($conn, "INSERT INTO musicians(uidusers,email,pwd,role)VALUES('$user', '$email','$pass','user')");
       $response_array["status"]="success";
   } else {
      $response_array["status"]="mail_failed";
       //Section 2: IMAP
       //Uncomment these to save your message in the 'Sent Mail' folder.
       #if (save_mail($mail)) {
       #    echo "Message saved!";
       #}
   }



   // $sql_insert = mysqli_query($conn, "INSERT INTO musicians(uidusers,email,pwd)VALUES('$user', '$email','$pass')");
   //  if ($sql_insert) {
   // //   .........send mail for verification
   // $response_array["status"]="success";
   //  }// else {
   //    # code...
   // }
   
}
echo json_encode($response_array);
?>