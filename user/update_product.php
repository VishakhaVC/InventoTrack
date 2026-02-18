<?php 

    // if(!isset($_SERVER['HTTP_REFERER'])){
    //     // redirect them to your desired location
    //     header('location: http://localhost/freshcery/index.php');
    //     exit;
    // }

?>
<?php 
// require "includes/header.php";
?>
<?php include "includes/config.php"; ?>


<?php  


    // if(!isset($_SESSION['username'])) {
                
    //     echo "<script> window.location.href='".APPURL."'; </script>";

    // }

    if(isset($_POST['update'])) {
        
        $id = $_POST['cart_id'];
        $pro_qty = $_POST['pro_qty'];
        $subtotal = $_POST['subtotal'];

        $query = mysqli_query($connection, "UPDATE tbl_cart SET pro_qty = '$pro_qty', pro_subtotal = '$subtotal'
        WHERE cart_id='$id'");

        if ($query) {
            // echo '<div class="alert alert-success">Item has been removed from Cart!</div>';
            header("Location: cart.php");
            exit();
        } else {
            echo "Error deleting record: " . $connection->error;
        }


    }


?>



<?php require "../includes/footer.php"; ?>
