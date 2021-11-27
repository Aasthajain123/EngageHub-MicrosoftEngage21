<?php 
  include('admin/include/dbcon.php');
  if (isset($_POST['submit'])) {
  $inpemail = $_POST['email'];
  $data = mysqli_query($sql_con,"select * from students where stdemail = '$inpemail'");
  $row = mysqli_fetch_array($data);
  $email = $row['stdemail'];
  if($email != $inpemail){
    echo "<script>alert('Email does not exist')</script>";
    echo "<script>window.location='studentlogin.php'</script>";
    return false;
  }
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "nikiiiii123456nikuu@gmail.com";
  $mail->Password = "MicrosoftEngage";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "true";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "nikiiiii123456nikuu@gmail.com";
  $mail->FromName = "ENGAGEHUB";
  
  $mail->addAddress($row["stdemail"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "This mail is from Student Hub to show your password";
  $mail->Body = "<i>This is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   // echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   $msg = "Mail has been sent successfully";
   header("location: studentlogin.php?msg=".$msg);
  }
  }
  
   ?>