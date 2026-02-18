<?php
session_start();
?>
<?php
include "includes/config.php";
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
    <title>My Account</title>
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

    <!-- header area start -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- header area end -->

    <!-- breadcrumb area start -->
    <!-- <div class="breadcrumb-area mb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- breadcrumb area end -->

    <!-- Start of My Account Wrapper -->
    <div class="my-account-wrapper pb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-dashboard pb-50">
                            <div class="user-info mb-30">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <div class="single-info">
                                            <p class="user-name">Hello <span>
                                                    <?php echo $_SESSION['user_name']; ?>!
                                                </span></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="single-info">
                                            <p>Need Assistance? Customer service at <a
                                                    href="#">admin@inventotrack.com</a></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <div class="single-info">
                                            <p>E-mail them at <a href="#">support@inventotrack.com</a></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-3">
                                        <div class="single-info justify-content-lg-center">
                                            <a class="btn btn-secondary" href="cart.php">View Cart</a>
                                        </div>
                                    </div>
                                </div> <!-- end of row -->
                            </div> <!-- end of user-info -->

                            <div class="main-dashboard">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                        <ul class="nav flex-column dashboard-list" role="tablist">
                                            <li>
                                                <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                                    data-bs-target="#dashboard" type="button" role="tab"
                                                    aria-controls="dashboard" aria-selected="true">Dashboard</button>
                                            </li>
                                            <li>
                                                <button class="nav-link" id="orders-tab" data-bs-toggle="tab"
                                                    data-bs-target="#orders" type="button" role="tab"
                                                    aria-controls="orders" aria-selected="false">Orders</button>
                                            </li>
                                            <!-- <li>
                                                <button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads" type="button" role="tab" aria-controls="downloads" aria-selected="false">Downloads</button>
                                            </li> -->
                                            <li>
                                                <button class="nav-link" id="address-tab" data-bs-toggle="tab"
                                                    data-bs-target="#address" type="button" role="tab"
                                                    aria-controls="address" aria-selected="false">Addresses</button>
                                            </li>
                                            <li>
                                                <button class="nav-link" id="account-details-tab" data-bs-toggle="tab"
                                                    data-bs-target="#account-details" type="button" role="tab"
                                                    aria-controls="account-details" aria-selected="false">Account
                                                    details</button>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="login.php">logout</a>
                                            </li>
                                        </ul> <!-- end of dashboard-list -->
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                                        <!-- Tab panes -->
                                        <div class="tab-content dashboard-content">
                                            <div id="dashboard" class="tab-pane fade show active" role="tabpanel"
                                                aria-labelledby="dashboard-tab">
                                                <h3>Dashboard </h3>
                                                <p>From your account dashboard. you can easily check &amp; view your <a
                                                        href="#">recent orders</a>, manage your <a href="#">shipping and
                                                        billing addresses</a> and <a href="#">edit your password and
                                                        account details.</a></p>
                                            </div> <!-- end of tab-pane -->

                                            <div id="orders" class="tab-pane fade" role="tabpanel"
                                                aria-labelledby="orders-tab">
                                                <h3>Orders</h3>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php                                     // Assuming $connection is your database connection object
                                                            $query = "SELECT om.order_id, om.order_date, om.order_status, SUM(od.order_quantity * od.order_price) AS total_amount 
                                                            FROM tbl_order_master om 
                                                            INNER JOIN tbl_order_details od ON om.order_id = od.order_id 
                                                            WHERE om.user_id = '$_SESSION[user_id]'
                                                            GROUP BY om.order_id 
                                                            ORDER BY om.order_date DESC";
                                                            // Query to fetch orders data
                                                            $result = $connection->query($query);

                                                            if ($result->num_rows > 0) {
                                                                $counter = 1; // Counter for order number
                                                                while ($row = $result->fetch_assoc()) {
                                                                    // Format date
                                                                    $order_date = date("F j, Y", strtotime($row['order_date']));

                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $counter++; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $order_date; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['order_status']; ?>
                                                                        </td>
                                                                        <td>Rs
                                                                            <?php echo number_format($row['total_amount'], 2); ?>
                                                                        </td>
                                                                        <td><a class="btn btn-secondary"
                                                                                href="cart.php">view</a></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                // If no orders found
                                                                ?>
                                                                <tr>
                                                                    <td colspan="5">No orders found.</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <!-- end of tab-pane -->

                                            <!-- <div id="downloads" class="tab-pane fade" role="tabpanel" aria-labelledby="downloads-tab">
                                                <h3>Downloads</h3>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Downloads</th>
                                                                <th>Expires</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Volga - Ecommerce Bootstrap Template</td>
                                                                <td>August 10, 2019</td>
                                                                <td>Never</td>
                                                                <td><a class="btn btn-secondary" href="#">Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gatcomart - Ecommerce HTML Template</td>
                                                                <td>September 11, 2019</td>
                                                                <td>Never</td>
                                                                <td><a class="btn btn-secondary" href="#">Download File</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> end of tab-pane -->

                                            <!-- <div id="address" class="tab-pane" role="tabpanel" aria-labelledby="address-tab">
                                                <p>The following addresses will be used on the checkout page by default.</p>
                                                <h4 class="billing-address">Billing address</h4>
                                                <a class="btn btn-secondary my-4" href="#">edit</a>
                                                <p>HasTech</p>
                                                <p>Bangladesh</p>
                                            </div> end of tab-pane -->

                                            <div id="account-details" class="tab-pane fade" role="tabpanel"
                                                aria-labelledby="account-details-tab">
                                                <h3>Account details </h3>
                                                <div class="login-form">
                                                    <form action=" " method="POST">
                                                        <div class="form-group row mb-3">
                                                            <label for="uname"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">User
                                                                Name</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="text" class="form-control" name="uname"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="fullname"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Full
                                                                Name</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="text" class="form-control" name="fullname"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="email"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Email
                                                                Address</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="email" class="form-control" name="email"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="inputpassword"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Current
                                                                Password</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="password" class="form-control"
                                                                    name="inputpassword" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="newpassword"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">New
                                                                Password</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="password" class="form-control"
                                                                    name="newpassword" required>
                                                                <!-- <button class="pass-show-btn" type="button">Show</button> -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="mnum"
                                                                class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Mobile
                                                                Number</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="text" class="form-control" name="mnum"
                                                                    required>
                                                                <!-- <button class="pass-show-btn" type="button">Show</button> -->
                                                            </div>
                                                        </div>
                                                        <div class="form-check row p-0 mt-4">
                                                            <div
                                                                class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-6 offset-lg-3">
                                                                <div class="custom-checkbox">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="subscribe" required>
                                                                    <span class="checkmark"></span>
                                                                    <label class="form-check-label" for="subscribe">Sign
                                                                        up for our newsletter<br></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="register-box d-flex justify-content-end mt-half">
                                                            <button type="submit"
                                                                class="btn btn-secondary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!-- end of tab-pane -->
                                        </div>
                                    </div>
                                </div> <!-- end of row -->
                            </div> <!-- end of main-dashboard -->
                        </div> <!-- end of user-dashboard -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of My Account Wrapper -->

    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->

    <!-- footer area start -->
    <<?php
    include 'includes/footer.php';
    ?> <!-- footer area end -->

        <!-- all js include here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.net/sinrato/sinrato/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jan 2024 08:10:45 GMT -->

</html>