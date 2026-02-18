<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
// Display the dashboard for authenticated users
// Include the database connection file
include 'includes/config.php';

// Fetch products from the database
$query = "SELECT p.*, c.category_name, f.feedback_ratings FROM tbl_product p
JOIN tbl_category c ON p.category_id = c.category_id LEFT JOIN tbl_feedback f on p.product_id = f.product_id";
$result = $connection->query($query);
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
    <title>InventoTrack</title>
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
        .product-module-thumb img {
            width: 100%;
            /* Set the width of the image to 100% of its container */
            height: auto;
            /* Maintain the aspect ratio */
        }
    </style>
</head>

<body>
    <?php
    // Header Container
    include 'includes/header.php';
    ?>
    <center>
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
    </center>
    <?php
    //Main Sidebar Container
    include 'includes/left_sidebar.php';
    ?>

    <!-- Featured categories products -->
    <div class="featured-categories-area pb-40">
        <div class="container-fluid">
            <div class="section-title">
                <h3><span>Featured</span> product</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="featured-cat-active owl-carousel owl-arrow-style">
                        <div class="pro-layout-two-single-item">
                            <div class="product-layout-two mb-30">
                                <div class="product-layout-info">
                                    <h4 class="pro-name"><a href="#">Laptops Headphone
                                            Mobiles</a></h4>
                                    <p class="total-items"> 3 products </p>
                                    <a href="#" class="shop-btn">+ shop now</a>
                                </div>
                                <div class="product-layout-thumb">
                                    <a href="#"><img src="assets/img/product/pro-layout-img7.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- <div class="product-layout-two mb-30">
                                <div class="product-layout-info">
                                    <h4 class="pro-name"><a href="shop-grid-left-sidebar.html">Cellphones & Accessories</a></h4>
                                    <p class="total-items"> 6 products </p>
                                    <a href="shop-grid-left-sidebar.html" class="shop-btn">+ shop now</a>
                                </div> -->
                            <!-- <div class="product-layout-thumb">
                                    <a href="shop-grid-left-sidebar.html"><img src="assets/img/product/pro-layout-img2.jpg" alt=""></a>
                                </div> -->
                        </div>
                    </div> <!-- </ end single item -->

                </div> <!-- </ end single item -->
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- featured categories area end -->

    <!-- home banner statics area -->

    <!-- home banner statics area end -->

    <!-- product wrapper area start -->

    <!-- product wrapper area start -->

    <!-- home4 product module five start -->
    <div class="home-module-five pb-25">
        <div class="container-fluid">
            <div class="section-title flash-title">
                <h3><span>Our</span> Products </h3>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6 offset-3 offset-md-0">
                    <!-- <div class="single-banner-statics">
                        <a href="shop-grid-left-sidebar.html"><img src="assets/img/banner/img-module2.jpg" alt=""></a>
                    </div> -->
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="pro-module-four-active4 owl-carousel owl-arrow-style">

                        <?php
                        // Display product information
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="single-module-home4">';
                            echo '<div class="product-module-four-item mb-30">';
                            echo '<div class="product-module-caption">';
                            echo '<div class="manufacture-com">';
                            echo '<p><a href="#">' . $row['category_name'] . '</a></p>';
                            echo '</div>';
                            echo '<div class="product-module-name">';
                            echo '<h3><a href="product.php?id=' . $row['product_id'] . '">' . $row['product_name'] . '</a></h3>';
                            echo '</div>';
                            // echo '<div class="product-details">';
                            // echo '<p>' . substr($row['product_details'], 0, 90) . '</p>'; // Additional product details
                            // echo '</div>';
                            echo '<div class="ratings">';
                            // echo 'Ratings: ';
                            // Assuming ratings are on a scale from 1 to 5
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $row['feedback_ratings']) {
                                    echo '<span><i class="lnr lnr-star"></i></span>';
                                } elseif ($i - 0.5 == $row['feedback_ratings']) {
                                    echo '<span><i class="lnr lnr-star-half"></i></span>';
                                } else {
                                    echo '<span><i class="lnr lnr-star-empty"></i></span>';
                                }
                            }
                            echo '</div>';
                            echo '<div class="price-box-module">';
                            echo '<span class="regular-price">&#8377; ' . $row['product_price'] . '</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="product-module-thumb thumb4">';
                            echo '<a href="product.php?id=' . $row['product_id'] . '">';
                            echo '<img src="assets/img/product/' . $row['product_image'] . '" alt="' . $row['product_name'] . '" width="500" height="400">';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- home4 product module five end -->

    <!-- home4 product module six start -->

    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->

    <!-- Footer Container -->
    <?php
    include 'includes/footer.php';
    ?>

    <!-- all js include here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>