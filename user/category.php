<?php
session_start();
include 'includes/config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <!-- <title><?php echo $product['product_name']; ?></title> -->
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
    <?php
    // Header Container
    include 'includes/header.php';
    ?>

    <div class="main-wrapper pt-35">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-shop-main-wrapper mb-50">
                        <div class="shop-top-bar mb-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode">
                                            <!-- <a href="#" data-target="column_3"><span>3-col</span></a>
                                            <a href="#" data-target="grid"><span>4-col</span></a> -->
                                            <a class="" href="#" data-target="list"><span>list</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-wrap grid column_3 row">
                            <?php
                            // Check if the category ID is provided in the URL
                            if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                                // Fetch products based on the category ID
                                $product_query = mysqli_query($connection, "SELECT * FROM tbl_product WHERE category_id = '{$category_id}'");
                                // Loop through the fetched products
                                while ($product = mysqli_fetch_assoc($product_query)) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- Product item start -->
                                        <div class="sinrato-list-item mb-30">
                                            <div class="sinrato-thumb">
                                                <a href="product.php?id=<?php echo $product['product_id']; ?>">
                                                    <img src="assets/img/product/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" width="500" height="400">
                                                </a>

                                            </div>
                                            <div class="sinrato-list-item-content">
                                                <?php
                                                // Fetch category name based on category_id
                                                $category_query = mysqli_query($connection, "SELECT category_name FROM tbl_category WHERE category_id = '{$product['category_id']}'");
                                                $category = mysqli_fetch_assoc($category_query);
                                                ?>
                                                <div class="manufacture-product">
                                                    <span><a href="#"><?php echo $category['category_name']; ?></a></span>
                                                </div>
                                                <div class="sinrato-product-name">
                                                    <h4><a href="product.php?id=<?php echo $product['product_id']; ?>"><?php echo $product['product_name']; ?></a></h4>
                                                </div>
                                                <div class="sinrato-ratings mb-15">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                                <div class="sinrato-product-des">
                                                    <p><?php echo $product['product_details']; ?></p>
                                                </div>
                                            </div>
                                            <div class="sinrato-box-action">
                                                <div class="price-box">
                                                    <span class="regular-price"><span class="special-price">&#8377;<?php echo $product['product_price']; ?></span></span>
                                                </div>
                                            </div>
                                        </div> <!-- end single list item -->
                                    </div>
                            <?php
                                }
                            } else {
                                echo "Category ID not provided in the URL.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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