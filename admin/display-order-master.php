<?php
session_start();
include './themepart/database-connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_ADMIN_DISPLAY_ORDER_MASTER</title>

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
<div class="wrapper">

<?php
include'./themepart/header.php';
include'./themepart/left-sidebar.php';
include'./themepart/preloader.php';
  ?>
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Display Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3>Order</h3>
              </div>
              <!-- /.card-header -->
             

              <?php
              //delete query
              if(isset($_GET['did'])){
                //echo "yes";
                $did = $_GET['did'];
                $deletequery = mysqli_query($connection, "delete from tbl_order_master where order_id='{$did}'");
                if($deletequery){
                  echo "<script>alert('Record Deleted');window.location='display-order-master.php';</script>";
                }
              }

              //display
              $query = mysqli_query($connection, "select * from tbl_order_master");
              $count = mysqli_num_rows($query);
              
              echo "<div class='card-body'>";

                echo "$count Records Found";
              
                echo "<table class='table table-bordered'>";
                  echo"<thead>";
                  echo "<tr>";
                  echo "<th>Order Date</th>";
                  echo "<th >User</th>";
                  echo "<th>Status</th>";
                  echo "<th>Action</th>"; 
                  echo "</tr>";
                  
                  echo "</thead>";
                 
                  while($row = mysqli_fetch_array($query)){

                    $userquery = mysqli_query($connection, "select * from tbl_user where user_id='{$row['user_id']}'");
                    $userrow = mysqli_fetch_array($userquery);

                      echo "<tbody>";
                      echo "<tr>";
                      echo "<td>{$row['order_date']}</td>";
                      echo "<td>{$userrow['user_fullname']}</td>";
                      echo "<td>{$row['order_status']}</td>";                   
                      echo "<td><a href='edit-order-master.php?eid={$row['order_id']}'>Edit</a> | <a href='display-order-master.php?did={$row['order_id']}'>Delete</a></td>";
                      echo "</tr>";
                      echo "</tbody>";
                }
                echo "</table>";
              echo"</div>";
              
                    ?>
               
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include'./themepart/footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>


