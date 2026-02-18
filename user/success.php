<?php
session_start();
include "includes/header.php";
include "includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Fetch cart details from the database based on the user ID
    $query = "SELECT * FROM tbl_cart WHERE user_id='$_SESSION[user_id]'";
    $result = $connection->query($query);

    $cartItems = array();
    while ($item = $result->fetch_assoc()) {
        $cartItems[] = $item;
    }

    // Insert order into order_master table
    $orderInsertQuery = "INSERT INTO tbl_order_master (user_id, order_date, order_status) VALUES ('$_SESSION[user_id]', NOW(), 'Processing')";
    $connection->query($orderInsertQuery);

    // Get the order ID of the newly inserted order
    $orderId = $connection->insert_id;

    // Process each item in the cart
    foreach ($cartItems as $cartItem) {
        $productId = $cartItem['pro_id'];
        $quantity = $cartItem['pro_qty'];

        // Fetch product details from the database
        $productQuery = "SELECT * FROM tbl_product WHERE product_id = '$productId'";
        $productResult = $connection->query($productQuery);
        $product = $productResult->fetch_assoc();

        // Calculate total amount for the product
        $totalAmount = $quantity * $product['product_price'];

        // Insert order details into order_details table
        $insertOrderDetailsQuery = "INSERT INTO tbl_order_details (order_id, product_id, order_quantity, order_price, order_total_amount) VALUES ('$orderId', '$productId', '$quantity', '{$product['product_price']}', '$totalAmount')";
        $connection->query($insertOrderDetailsQuery);

        // Update stock quantity
        $updateStockQuery = "UPDATE tbl_stock SET stock_quantity = stock_quantity - $quantity WHERE product_id = '$productId'";
        $connection->query($updateStockQuery);
    }

    // Clear the cart after successful order placement
    $clearCartQuery = "DELETE FROM tbl_cart WHERE user_id='$_SESSION[user_id]'";
    $connection->query($clearCartQuery);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <title>Order Success</title>
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Your order has been successfully placed!</h2>
                <p>Thank you for shopping with us.</p>
                <a href="index.php" class="btn btn-secondary">Home</a>
            </div>
        </div>
    </div>

    <!-- Footer and Scripts here -->
    <?php
    // include 'includes/footer.php';
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