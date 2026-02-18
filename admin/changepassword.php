<?php
session_start();

include'./themepart/database-connect.php';

//print_r($_SESSION);
// //Login Check
// if (isset($_SESSION['aid']) || isset($_SESSION['mid'])) {
//  // echo"<script>alert('Login required');window.location='login.php';</script>";
// } else{
//   echo"<script>alert('Login required');window.location='login.php';</script>";
// }

if($_POST) 
{

    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    if (isset($_SESSION['aid'])) 
    {
    $aid = $_SESSION['aid'];
    $oldpassq  = mysqli_query($connection,"select * from tbl_admin where admin_id='{$aid}'");
    $oldpassdata = mysqli_fetch_array($oldpassq);
    if($oldpassdata['admin_password']==$opass)
    {
        if($npass==$cpass)
        {
            if($opass==$npass)
            {
                echo "<script>alert('Old Password and New Password must be different')</script>";

            }else{
                $uq = mysqli_query($connection,"update tbl_admin set admin_password = '{$npass}' where admin_id='{$aid}'");
                echo "<script>alert('Password Changed')</script>";
                header("location:admin-dashboard.php");
            }
        }else{
            echo "<script>alert('New Password and Confirm Password not matched');</script>";
        }
    }else{
        echo "<script>alert('Old Password not matched');</script>";
    }
} else if($_POST) 

        if($mid = $_SESSION['mid']){
    $oldpassq  = mysqli_query($connection,"select * from tbl_manager where manager_id='{$mid}'");
    $oldpassdata = mysqli_fetch_array($oldpassq);
    if($oldpassdata['manager_password']==$opass)
    {
        if($npass==$cpass)
        {
            if($opass==$npass)
            {
                echo "<script>alert('Old Password and New Password must be different')</script>";

            }else{
                $uq = mysqli_query($connection,"update tbl_manager set manager_password = '{$npass}' where manager_id='{$mid}'");
                echo "<script>alert('Password Changed')</script>";
                header("location:manager-dashboard.php");
            }
        }else{
            echo "<script>alert('New Password and Confirm Password not matched');</script>";
        }
    }else{
        echo "<script>alert('Old Password not matched');</script>";
    }

} else {
  echo "<script>alert('Failed to change password');</script>";
  header("location:login.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CHANGE-PASSWORD</title>

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
      <p class="login-box-msg">Change Password</p>
      <form method="post">
      <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Old Password" name="opass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="npass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><a href="login.php" style="color: white;"> Change password</a></button>
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
