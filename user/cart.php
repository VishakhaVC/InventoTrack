<?php
session_start();
include 'includes/config.php';

// Fetch product details from the database based on the product ID
$query = "SELECT * FROM tbl_cart WHERE user_id='$_SESSION[user_id]'";
$result = $connection->query($query);

$allProducts = array();
while ($product = $result->fetch_assoc()) {
    $allProducts[] = $product;
}

if (isset($_POST['submit'])) {
    $inp_price = $_POST['inp_price'];
    $_SESSION['price'] = $inp_price;
    echo "<script> window.location.href='checkout.php'; </script>";
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
    <title>Add to Cart</title>
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
    <!-- <div class="breadcrumb-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- breadcrumb area end -->

    <!-- Start cart Wrapper -->
    <div class="shopping-cart-wrapper pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="shopping-cart">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="section-title">
                                        <h3>Shopping Cart</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Image</td>
                                                    <td>Product Name</td>
                                                    <!-- <td>Model</td> -->
                                                    <td>Unit Price</td>
                                                    <!-- <td>Update</td> -->
                                                    <td>Quantity</td>
                                                    <td>Total</td>
                                                    <td>Delete</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($allProducts) > 0) : ?>
                                                    <?php foreach ($allProducts as $product) : ?>
                                                        <tr>
                                                            <td>
                                                                <!-- <a href="product-details.html"><img src="assets/img/product/pro-layout-img5.jpg" alt="Cart Product Image" title="Compete Track Tote" class="img-thumbnail"></a> -->
                                                                <img src="<?php echo 'assets/img/product/' . $product['pro_image']; ?>" alt="<?php echo ($product['pro_image']); ?>" />
                                                            </td>
                                                            <td>
                                                                <?php echo $product['pro_name']; ?><br>
                                                            </td>
                                                            <td class="pro_price">&#8377; <?php echo $product['pro_price']; ?></td>
                                                            <td>
                                                                <input type="number" value="<?php echo $product['pro_qty']; ?>" class="form-control pro_qty" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" name="vertical-spin" data-price="<?php echo $product['pro_price']; ?>">
                                                            </td>

                                                            <td class="subtotal_price">
                                                                <?php $total_price = $product['pro_price'] * $product['pro_qty'];
                                                                echo '&#8377;' . number_format($total_price, 2); ?>
                                                            </td>
                                                            <td>
                                                                <form action="delete_product.php" method="POST">
                                                                    <input type="hidden" name="cart_id" value="<?php echo $product['cart_id']; ?>">
                                                                    <button type="submit" name="delete" class="btn-delete btn btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <div class="alert alert-danger bg-warning text-black text-center">
                                                        Your cart is empty!
                                                    </div>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- <div class="cart-accordion-wrapper mt-full mt-40">
                                        <h3>What would you like to do next?</h3>
                                        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                        <div id="cart_accordion" class="accordion mt-4">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingCoupon">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon">
                                                        Use Coupon Code
                                                    </button>
                                                </h2>
                                                <div id="collapseCoupon" class="accordion-collapse collapse show" aria-labelledby="headingCoupon" data-bs-parent="#cart_accordion">
                                                    <div class="accordion-body">
                                                        <div class="input-group row">
                                                            <label class="col-12 col-sm-12 col-md-3" for="input-coupon">Enter your coupon here</label>
                                                            <div class="col-12 col-sm-12 col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                                                    <input type="button" value="Apply Coupon" id="button-coupon" class="btn btn-secondary cart-pg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTax">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTax" aria-expanded="false" aria-controls="collapseTax">
                                                        Estimate Shipping &amp; Taxes<i class="ion ion-ios-arrow-down"></i>
                                                    </button>
                                                </h2>
                                                <div id="collapseTax" class="accordion-collapse collapse" aria-labelledby="headingTax" data-bs-parent="#cart_accordion">
                                                    <div class="accordion-body cart-select">
                                                        <p class="pb-20">Enter your destination to get a shipping estimate.</p>
                                                        <div class="input-group row form-group mb-3">
                                                            <label class="col-12 col-sm-12 col-md-3" for="input-country"><span class="text-danger">*</span> Country</label>
                                                            <div class="col-12 col-sm-12 col-md-9">
                                                                <select name="country_id" id="input-country" class="form-control nice-select">
                                                                    <option value=""> --- Please Select --- </option>
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
                                                        <div class="input-group row form-group mb-3">
                                                            <label class="col-12 col-sm-12 col-md-3" for="input-zone"><span class="text-danger">*</span> Region / State</label>
                                                            <div class="col-12 col-sm-12 col-md-9">
                                                                <select name="zone_id" id="input-zone" class="form-control nice-select">
                                                                    <option value=""> --- Please Select --- </option>
                                                                    <option value="">Alabama</option>
                                                                    <option value="">Arizona</option>
                                                                    <option value="">California</option>
                                                                    <option value="">Florida</option>
                                                                    <option value="">Newyork</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="input-group row form-group mb-5">
                                                            <label class="col-12 col-sm-12 col-md-3" for="input-postcode"><span class="text-danger">*</span> Post Code</label>
                                                            <div class="col-12 col-sm-12 col-md-9">
                                                                <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control mb-0">
                                                            </div>
                                                        </div>
                                                        <button type="button" id="button-quote" class="btn btn-secondary">Get Quotes</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingGift">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGift" aria-expanded="false" aria-controls="collapseGift">
                                                        Use Gift Certificate<i class="ion ion-ios-arrow-down"></i>
                                                    </button>
                                                </h2>
                                                <div id="collapseGift" class="accordion-collapse collapse" aria-labelledby="headingGift" data-bs-parent="#cart_accordion">
                                                    <div class="accordion-body">
                                                        <div class="input-group">
                                                            <label class="col-12 col-sm-12 col-md-3" for="input-voucher">Enter your gift certificate code here</label>
                                                            <div class="col-12 col-sm-12 col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
                                                                    <input type="button" value="Apply Gift Certificate" id="button-boucher" class="btn btn-secondary cart-pg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="cart-amount-wrapper">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4 offset-md-8">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Sub-Total:</strong></td>
                                                            <td class="full_price mt-3" colspan="4"><b>
                                                                    <?php
                                                                    $totalPrice = 0;
                                                                    foreach ($allProducts as $product) {
                                                                        $totalPrice += $product['pro_price'] * $product['pro_qty'];
                                                                    }
                                                                    echo '&#8377;' . number_format($totalPrice, 2);
                                                                    ?> </b>
                                                            </td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <td><strong>Total:</strong></td>
                                                            <td><span class="color-primary">$860.00</span></td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-button-wrapper d-flex justify-content-between mt-4">
                                        <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
                                        <form method="POST" action="cart.php">
                                            <input class="inp_price form-control" type="hidden" value="" name="inp_price">
                                            <?php if (count($allProducts) > 0) : ?>
                                                <button type="submit" name="submit" class="btn btn-secondary dark align-self-end">Checkout</button>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of shopping-cart -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End cart Wrapper -->

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
    <!-- <script>
        $(document).ready(function() {

            $(".form-control").keyup(function() {
                var value = $(this).val();
                value = value.replace(/^(0*)/, "");
                $(this).val(1);
            });


            $(".pro_qty").mouseup(function() {

                var $el = $(this).closest('tr');



                var pro_qty = $el.find(".pro_qty").val();
                var pro_price = $el.find(".pro_price").html();

                var subtotal = pro_qty * pro_price;
                $el.find(".subtotal_price").html("");

                $el.find(".subtotal_price").append(subtotal);

                $(".pro_qty").on('click', function(e) {

                    var id = $(this).val();


                    $.ajax({
                        type: "POST",
                        url: "update_product.php",
                        data: {
                            update: "update",
                            id: id,
                            pro_qty: pro_qty,
                            subtotal: subtotal
                        },

                        success: function() {
                            alert("done");
                            //reload();
                        }
                    })
                });


                fetch();
            });


            $(".btn-delete").on('click', function(e) {

                var id = $(this).val();


                $.ajax({

                    type: "POST",
                    url: "delete_product.php",
                    data: {
                        delete: "delete",
                        id: id,
                    },

                    success: function() {
                        alert("product deleted successfully");
                        reload();
                    }
                })
            });

            fetch();

            function fetch() {

                setInterval(function() {
                    var sum = 0.0;
                    $('.subtotal_price').each(function() {
                        sum += parseFloat($(this).text());
                    });
                    // $(".full_price").html('Total Price in USD: ' + sum);
                    $(".inp_price").val(sum);



                }, 4000);
            }



            function reload() {
                $("body").load("cart.php");
            }

        })
    </script> -->

    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>