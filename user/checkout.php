<?php
session_start();

include "includes/config.php";

// Fetch product details from the database based on the product ID
$query = "SELECT * FROM tbl_cart WHERE user_id='$_SESSION[user_id]'";
$result = $connection->query($query);

$allProducts = array();
while ($product = $result->fetch_assoc()) {
    $allProducts[] = $product;
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
    <title>Checkout Page</title>
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

    <!-- Start of Checkout Wrapper -->
    <div class="checkout-wrapper pt-10 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <main id="primary" class="site-main">
                        <div class="user-actions-area">
                            <div class="row">
                                <div class="col-12">

                                </div>
                            </div> <!-- end of row -->
                        </div> <!-- end of user-actions -->

                        <div class="checkout-area">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-7">
                                    <div class="checkout-form">
                                        <div class="section-title left-aligned">
                                            <h3>Billing Details</h3>
                                        </div>

                                        <form action="#">
                                            <div class="row g-2 mb-3">
                                                <div class="mb-3 col-12 col-sm-12 col-md-6">
                                                    <label for="full_name">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="full_name" required>
                                                </div>
                                                <div class="mb-3 col-12 col-sm-12 col-md-6">
                                                    <label for="email_address">Email Address <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email_address" required>
                                                </div>

                                            </div>
                                            <div class="row g-2 mb-3">

                                            </div>
                                            <div class="row g-2 mb-3">
                                                <div class="mb-3 col-12">
                                                    <label for="p_address">Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="p_address" required>
                                                </div>
                                            </div>
                                            <div class="row g-2 mb-3">
                                                <div class="mb-3 col-12 col-sm-12 col-md-6">
                                                    <label for="city_name">City <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="city_name" required>
                                                </div>
                                                <div class="mb-3 col-12 col-sm-12 col-md-6">
                                                    <label for="zip_code">Zip Code <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="zip_code" required>
                                                </div>

                                            </div>
                                            <div class="row g-2 mb-3">

                                                <div class="mb-3 col-12 col-sm-12 col-md-6">
                                                    <label for="country_name" class="d-block">Country <span class="text-danger">*</span></label>
                                                    <select name="country_id" id="country_name" class="form-control nice-select" required="">
                                                        <option value=""> --- Select --- </option>
                                                        <option value="">Argentina</option>
                                                        <option value="">Bangladesh</option>
                                                        <option value="">Belgium</option>
                                                        <option value="">Brazil</option>
                                                        <option value="">Germany</option>
                                                        <option value="">India</option>
                                                        <option value="">United Kingdom</option>
                                                        <option value="">United States</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- end of checkout-form -->
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                                    <div class="order-summary">
                                        <div class="section-title left-aligned">
                                            <h3>Your Order</h3>
                                        </div>
                                        <div class="product-container">
                                            <?php foreach ($allProducts as $product) : ?>
                                                <div class="product-list">
                                                    <div class="product-inner d-flex align-items-center">
                                                        <div class="product-image me-4 me-sm-5 me-md-4 me-lg-5">
                                                            <img src="<?php echo 'assets/img/product/' . $product['pro_image']; ?>" alt="<?php echo ($product['pro_image']); ?>" />
                                                        </div>
                                                        <div class="media-body">
                                                            <h5><?php echo $product['pro_name']; ?></h5>
                                                            <p class="product-quantity">Quantity: <?php echo $product['pro_qty']; ?></p>
                                                            <p class="product-final-price">&#8377; <?php echo $product['pro_price']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                        </div> <!-- end of product-container -->
                                        <div class="order-review">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <!-- <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td class="text-center"><?php if (isset($_SESSION['price'])) : ?>
                                                                    <?php echo $_SESSION['price']; ?>
                                                                <?php endif; ?></td>
                                                        </tr> -->
                                                        <?php
                                                        // Calculate subtotal
                                                        $subTotal = 0;
                                                        foreach ($allProducts as $product) {
                                                            // Multiply the quantity by the price and add to the subtotal
                                                            $subTotal += $product['pro_qty'] * $product['pro_price'];
                                                        }
                                                        ?>
                                                        <tr class="order-total">
                                                            <th>SubTotal</th>
                                                            <td class="text-center"><strong>&#8377; <?php echo $subTotal; ?>.00</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="checkout-payment">
                                            <form action="success.php" method="POST">
                                                <div class="form-row justify-content-end">
                                                    <input type="submit" name="submit" class="btn btn-secondary dark" value="Confirm Order">
                                                </div>
                                            </form>
                                        </div> <!-- end of checkout-payment -->
                                    </div> <!-- end of order-summary -->
                                </div>
                            </div> <!-- end of row -->
                        </div> <!-- end of checkout-area -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of Checkout Wrapper -->

    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->

    <!-- footer area start -->
    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer area end -->

    <!-- all js include here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>