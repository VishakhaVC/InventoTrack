<?php

// if (!isset($_SERVER['HTTP_REFERER'])) {
//     // redirect them to your desired location
//     header('location: http://localhost/freshcery/index.php');
//     exit;
// }

?>
<?php 
// include "includes/header.php"; 
?>
<?php include "includes/config.php"; ?>


<?php

// if (!isset($_SESSION['username'])) {

//     echo "<script> window.location.href='" . APPURL . "'; </script>";
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cart_id'])) {

        $cart_id = $_POST['cart_id'];

        // Construct the DELETE query
        $query = mysqli_query($connection, "DELETE FROM tbl_cart WHERE cart_id='{$cart_id}'");

        if ($query) {
            // echo '<div class="alert alert-success">Item has been removed from Cart!</div>';
            header("Location: cart.php");
            exit();
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    }
}
?>



<?php require "includes/footer.php"; ?>
