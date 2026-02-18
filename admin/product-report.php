<?php
session_start();
include './themepart/database-connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InventoTrack_MANAGER_DISPLAY_REPORT</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<center><h1>INVENTOTRACK</h1><hr/>
          <h3>REPORTS</h3> <br/>
                                
        <?php
             echo "Date : " . date('d-m-Y');
        ?>

        <input type="button" value="PRINT" onclick="window.print();">
        </center>   
        <?php 
        
        if(isset($_GET['catid']))
        {
        $catid = $_GET['catid'];
        $price1 = $_GET['txt1'];
        $price2 = $_GET['txt2'];
        $productquery = mysqli_query($connection, "select * from tbl_product where category_id='{$catid}' and product_price between $price1 and $price2 ");

        $count = mysqli_num_rows($productquery);
        echo"<center><br/>$count Records found</center>";
        echo "<table border='1' align='center'>";
        echo"<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th >Details</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Category</th>";
        echo "<th>Photo</th>"; 
        echo "<th>Total Amount</th>";
        echo "</tr>";
        

        while($row = mysqli_fetch_array($productquery)){

        $categoryquery = mysqli_query($connection, "select * from tbl_category where category_id='{$row['category_id']}'");
        $categoryrow = mysqli_fetch_array($categoryquery);  

                    echo "<tr>";
                    echo "<td>{$row['product_id']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['product_details']}</td>";
                    echo "<td>{$row['product_price']}</td>";
                    echo "<td>{$row['product_quantity']}</td>";
                    echo "<td>{$categoryrow['category_name']}</td>"; 
                    echo "<td><a target='_blank' href='./uploads/{$row['product_image']}'>
                    <img src='./uploads/{$row['product_image']}' width=50 /></a></td>";    
                    $total = $row['product_price'] * $row['product_quantity'];
                    echo "<td>$total</td>"; 
                    
                    echo "</tr>";
        }

        echo "</table>";
        }
        ?>

</body>

</html>