<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include'./themepart/database-connect.php';

if($_POST){
  $email = $_POST['email'];
  $query = mysqli_query($connection,"select * from tbl_admin where admin_email = '{$email}'");
  $count = mysqli_num_rows($query);
  if($count==1){
    // $data = mysqli_fetch_array($query);
    // echo $data['admin_password'];
    // $message = "Hello <br> Your password is: " . $data['admin_password'];

    $newotp = rand(111111,999999);
    mysqli_query($connection,"update tbl_admin set admin_password='{$newotp}' 
    where admin_email = '{$email}'");

    $message = "Hello <br> Your password is: " . $newotp;


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'inventotrack23@gmail.com';                     //SMTP username
    $mail->Password   = 'wmbczkotzpejtxaz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('inventotrack23@gmail.com', 'InventoTrack');
    $mail->addAddress($email, 'InventoTrack');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgot your password';
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo "<script>alert('Password sent to your email');window.location='login.php';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


  }else
  echo"<script>alert('Email not found');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN_FORGOT-PASSWORD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
        
        <?php
        include'./themepart/preloader.php';
        ?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>InventoTrack</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Forgot Password</p>
      <form method="post">
      <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
