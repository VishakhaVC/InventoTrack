<?php
session_start();
include 'includes/config.php';

if (isset($_POST['submit'])) {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, "select * from tbl_user where user_name='{$user_name}'");
    $count = mysqli_num_rows($query);


    if ($count > 0) {
        $user = mysqli_fetch_assoc($query);
        // Verify Password
        if (password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            header('Location: index.php');
        } else {
            echo "<script>alert('Invalid password. Please try again');</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register');</script>";
    }
    mysqli_close($connection);
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
    <title>InventoTrack Login</title>
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
            <div class="header-top-menu theme-bg sticker">
                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo-sinrato2.png" alt="brand-logo"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-login">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="section-title text-center">
                                        <h3>Log in to your account</h3>
                                    </div>
                                </div>
                            </div> <!-- end of row -->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                                    <div class="login-form">
                                        <form method="post">
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="text"
                                                    class="col-12 col-sm-12 col-md-4 col-form-label">Username</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="text" class="form-control" name="username"
                                                        placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="password"
                                                    class="col-12 col-sm-12 col-md-4 col-form-label">Password</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" required>
                                                    <!-- <button class="pass-show-btn" type="button">Show</button> -->
                                                </div>
                                            </div>
                                            <div class="login-box mt-3 text-center">
                                                <li><a href="forgot_password.php" class="text-left mb-2 mt-2">Forgot
                                                        your password?</a></li>
                                                <button type="submit" name="submit"
                                                    class="btn btn-secondary text-right mb-4 mt-4">Login</button>
                                            </div>
                                            <div class="text-center pt-20 top-bordered">
                                                <p>No account? <a href="register.php">Create one here</a></p>
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
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->

    <!-- footer area start -->
    <footer>
        <!-- footer top area start -->
        <div class="footer-top pt-30 pb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                                <div class="footer-logo mb-30">
                                    <a href="index.html">
                                        <img src="assets/img/logo/logo-sinrato2.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                                <h4>contact us</h4>
                            </div>
                            <div class="widget-body">
                                <div class="footer-useful-link">
                                    <ul>
                                        <li><span>Address:</span> Thaltej Ahmedabad</li>
                                        <li><span>Email:</span> support@inventotrack.com </li>
                                        <li><span>Call us:</span> <strong>1-01-234-5678</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- all js include here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>