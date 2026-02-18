<?php
include 'includes/config.php';

if ($_POST) {

  $email = $_POST['email'];
  $new_password = $_POST['password1'];
  $confirm_password = $_POST['password2'];

  $query = mysqli_query($connection, "select * from tbl_user where user_email='{$email}'");
  $count = mysqli_num_rows($query);

  if ($count > 0 && $count != " ") {
    // Check if the new password and confirm password match
    if ($new_password === $confirm_password) {
      // Update the password in the database
      $updateQuery = mysqli_query($connection, "update tbl_user set user_password='{$new_password}' where user_email='{$email}'");

      if ($updateQuery) {
        header("location:login.php");
        echo "<script>alert('Password changed successfully!!');</script>";
      } else {
        echo "<script>alert('Error updating password');</script>";
      }
    } else {
      echo "<script>alert('Passwords do not match');</script>";
    }
  } else {
    echo "<script>alert('Invalid email');</script>";
  }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <title>Forgot Password</title>
    <!--Fevicon-->
    <link rel="icon" href="assets/img/icon/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- linear-icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/linear-icon.css">
    <!-- all css plugins css -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- default style -->
    <link rel="stylesheet" href="assets/css/default.css">
    <!-- Main Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>

    <!-- Start of Login Wrapper -->
    <div class="login-wrapper pb-70">
        <div class="container-fluid">
            <div class="col-lg-3 col-md-4 col-4">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logo/logo-sinrato2.png" alt="brand-logo"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-login">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="section-title text-center">
                                        <h3>Forgot Password</h3>
                                    </div>
                                </div>
                            </div> <!-- end of row -->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                                    <div class="login-form">
                                        <form method="post">
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="email" class="col-12 col-sm-12 col-md-4 col-form-label">Email</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="password" class="col-12 col-sm-12 col-md-4 col-form-label">New Password</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="password" class="form-control" name="password1" placeholder="New Password" required>
                                                    <!-- <button class="pass-show-btn" type="button">Show</button> -->
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="c-password" class="col-12 col-sm-12 col-md-4 col-form-label">Confirm Password</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
                                                    <!-- <button class="pass-show-btn" type="button">Show</button> -->
                                                </div>
                                            </div>
                                            <div class="login-box mt-5 text-center">
                                                <button type="submit" class="btn btn-secondary mb-4 mt-4">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of user-login -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of Login Wrapper -->

    <!-- scroll to top -->

    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->


    <!-- all js include here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>