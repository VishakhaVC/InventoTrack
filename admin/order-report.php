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
        
        if($_GET)
        {
        $date1 = $_GET['txt1'];
        $date2 = $_GET['txt2'];
        $query = mysqli_query($connection, "select * from tbl_order_master where order_date between '{$date1}' and '{$date2}' ");

        $count = mysqli_num_rows($query);
        echo"<center><br/>$count Records found</center>";
        echo "<table border='1' align='center'>";
        echo"<tr>";
        echo "<th>Order ID</th>"; 
        echo "<th>Order Date</th>";
        echo "<th>User</th>";
        echo "<th>Status</th>"; 
        
        echo "</tr>";
        

        while($row = mysqli_fetch_array($query)){

          

          $userquery = mysqli_query($connection, "select * from tbl_user where user_id='{$row['user_id']}'");
          $userrow = mysqli_fetch_array($userquery);
                    echo "<tr>";
                    echo "<td>{$row['order_id']}</td>";
                    echo "<td>{$row['order_date']}</td>";
                    echo "<td>{$userrow['user_fullname']}</td>";  
                    echo "<td>{$row['order_status']}</td>";
                   
                    echo "</tr>";
        }

        echo "</table>";
        }
        ?>

</body>

</html>