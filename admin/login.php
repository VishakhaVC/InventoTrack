<?php
session_start();
include './themepart/database-connect.php';

if ($_POST) {
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $type = $_POST['type'];

  if ($type == "admin") {

    $query = mysqli_query($connection, "select * from tbl_admin where admin_email='{$email}' and admin_password='{$pwd}'");
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if ($count == 1) {
      $_SESSION['adminname'] = $row['admin_name'];
      $_SESSION['aid'] = $row['admin_id'];
      header("location:admin-dashboard.php");
    } else {
      echo "<script>alert('Admin Login Failed');</script>";
    }
  } else if ($type == "manager") {
    $query = mysqli_query($connection, "select * from tbl_manager where manager_email='{$email}' and manager_password='{$pwd}'");
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if ($count == 1) {
      $_SESSION['managername'] = $row['manager_name'];
      $_SESSION['mid'] = $row['manager_id'];
      header("location:manager-dashboard.php");
    } else {
      echo "<script>alert('Manager Login Failed');</script>";
    }
  } else {
    echo "<script>alert('Select Type');</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    include './themepart/preloader.php';
    ?>

    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="dist/img/logo5.png" width="300px">
      </div>
      <div class="card-body">
        <p class="login-box-msg"></p>

        <form method="post" id="myform">
          <!-- LOGIN TYPE -->

          <div class="row">
            <div class="col-12">
              <div class="input-group mb-3">
                <select name="type" class="form-control" required>
                  <option>----Select Login Type----</option>
                  <option value="admin">ADMIN</option>
                  <option value="manager">MANAGER</option>
                </select>
              </div>
              <label id="type-error" class="error" for="type"></label>
            </div>
            <div class="col-12">
              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <label id="email-error" class="error" for="email"></label>
            </div>
            <div class="col-12">
              <div class="input-group mb-3">
                <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <label id="pwd-error" class="error" for="pwd"></label>
            </div>

            <div class="col-8">
              <p class="mb-1">
                <a href="forgot-password.php">Forgot Password?</a>
              </p>
            </div>
            <!-- /.col -->

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->



      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jquery-validation -->
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#myform").validate({
        rules: {
          type: "required",
          email: "required",
          pwd: "required",
        },
        messages: {
          type: "Select type",
          email: "*Please enter email",
          pwd: "*Please enter password",
        },
      });
    });
  </script>
  <style>
    .error {
      color: red;
    }
  </style>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>