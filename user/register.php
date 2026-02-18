<?php
session_start();

include 'includes/config.php';
$usernameErr = $fullnameErr = $emailErr = $passwordErr = $mobnumErr = $addressErr = "";
$username = $fullname = $email = $password = $mobnum = $address = "";

if (isset($_POST['submit'])) {

    // Validate username
    if (empty($_POST['username'])) {
        $usernameErr = "UserName is Required";
    } else {
        $username = $_POST["username"];
        // Check if username only contains letters, numbers and underscore(_)
        if (!preg_match("/^[a-zA-Z0-9_ ]+$/", $username)) {
            $usernameErr = "Only letters, numbers and underscore(_) allowed";
        } else {
            // Check if username is already taken
            $checkUsername = mysqli_query($connection, "SELECT user_name FROM tbl_user WHERE user_name='{$username}'");
            if (mysqli_num_rows($checkUsername) > 0) {
                $usernameErr = "Username is already taken. Please choose a different one.";
            }
        }
    }
    // Validate fullname
    if (empty($_POST['fullname'])) {
        $fullnameErr = "FullName is Required";
    } else {
        $fullname = $_POST["fullname"];
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
            $fullnameErr = "Only letters and whitespaces allowed";
        }
    }
    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = "Email is Required";
    } else {
        $email = $_POST["email"];
        // Check if email format is correct
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Enter proper format of email";
        }
    }
    // Validate password
    if (empty($_POST['password'])) {
        $passwordErr = "Password is Required";
    } else {
        $ppassword = $_POST['password'];
        // Check if password is in required format
        if (!preg_match("/^[a-zA-Z0-9@]{7,15}$/", $ppassword)) {
            $passwordErr = "Password should be between 7 and 15 characters and can only contain letters, numbers, and '@'";
        } else {
            // $password = $_POST['password'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }
    // Validate mobile number
    if (empty($_POST['mobnum'])) {
        $mobnumErr = "Mobile Number is Required";
    } else {
        $mobnum = $_POST["mobnum"];
        // Check if mobile number only contains digits
        if (!preg_match("/^\d{10}$/", $mobnum)) {
            $mobnumErr = "Invalid phone number format (10 digits only)";
        }
    }
    // Validate address
    if (empty($_POST['address'])) {
        $addressErr = "Address is Required";
    } else {
        $address = $_POST['address'];
    }

    // If no validation errors, insert data into the database
    if (empty($usernameErr) && empty($fullnameErr) && empty($emailErr) && empty($passwordErr) && empty($mobnumErr) && empty($addressErr)) {

        $query = mysqli_query($connection, "INSERT INTO tbl_user(user_name, user_fullname, user_email, user_password, user_mobile_number, user_address) 
                VALUES('{$username}','{$fullname}','{$email}','{$password}','{$mobnum}','{$address}')");

        if ($query) {
            echo "<script>alert('Registered'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error registering user');</script>";
        }
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
    <title>Registration</title>
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
    <style>
        .error {
            color: #FF0000;
            /* font-weight: bold; */
        }
    </style>
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
                        <div class="user-register">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="section-title text-center">
                                        <h3>Create an Account</h3>
                                    </div>
                                </div>
                            </div> <!-- end of row -->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                                    <div class="registration-form login-form">
                                        <form action="" method="post">
                                            <div class="login-info mb-20">
                                                Already have an account? <a href="login.php">Log in instead!</a>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="f-name" class="col-12 col-sm-12 col-md-4 col-form-label">User Name <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="form-control" name="username" placeholder="UserName"> <span class="error"><?php echo $usernameErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="l-name" class="col-12 col-sm-12 col-md-4 col-form-label">Full Name <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="form-control" name="fullname" placeholder="FisrstName LastName"> <span class="error"><?php echo $fullnameErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="email" class="col-12 col-sm-12 col-md-4 col-form-label">Email Address <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="email" class="form-control" name="email" placeholder="Email Address"> <span class="error"><?php echo $emailErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="inputpassword" class="col-12 col-sm-12 col-md-4 col-form-label">Password <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="password" class="form-control" name="password" placeholder="Password"> <span class="error"><?php echo $passwordErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="l-name" class="col-12 col-sm-12 col-md-4 col-form-label">Mobile Number <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="form-control" name="mobnum" placeholder="Mobile Number"> <span class="error"><?php echo $mobnumErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="l-name" class="col-12 col-sm-12 col-md-4 col-form-label"> Address <span class="error">*</span></label>
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="form-control" name="address" placeholder="Address"> <span class="error"><?php echo $addressErr ?></span>
                                                </div>
                                            </div>
                                            <div class="register-box d-flex justify-content-end mt-40">
                                                <button type="submit" name="submit" class="btn btn-secondary">Register</button>
                                            </div>
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
        <div class="footer-top pt-50 pb-50">
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