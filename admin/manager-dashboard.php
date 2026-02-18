<?php

include'./themepart/database-connect.php';

session_start();

  if (!isset($_SESSION['mid'])){
     echo "<script> alert ('Login Required');window.location='login.php';</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_MANAGER_DASHBOARD</title>

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

  <!-- Preloader -->
  <?php
  include'./themepart/preloader.php';
  ?>

  <!-- Navbar -->
  <?php
    include'./themepart/header.php';
  ?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include'./themepart/left-sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manager-dashboard.php">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- sales small box -->
            <a href="display-order-details.php">
            <div class="small-box bg-info">
              <div class="inner">
              <css style='color: white;'>
                <h3>
                <?php
              $query = mysqli_query($connection, "select * from tbl_order_details");
              $count = mysqli_num_rows($query);              
              echo $count;
              ?>
                </h3>

                <p>Sales</p>    
                </css>          
              </div>
              <css style='color: grey;'>
              <div class="icon">            
                <i class="ion ion-bag"></i>              
              </div>
              </css>
            </div>
          </div>
          </a>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- stock small box -->
            <a href="display-product.php">
            <div class="small-box bg-success">
              <div class="inner">
              <css style='color: white;'>
                <h3>
                  <?php
              $query = mysqli_query($connection, "select * from tbl_product");
              $count = mysqli_num_rows($query);              
              echo $count;
              ?>
              </h3>
                <p>Total Product</p>              
                </css>
              </div>
              <css style='color: grey;'>
              <div class="icon">
                <i class="fas fa fa-laptop"></i>
              </div>
              </css>
            </div>
          </div>
          </a>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- user small box -->
            <a href="display-category.php">
            <div class="small-box bg-warning">
              <div class="inner">
              <css style='color: white;'>
                <h3>
                  <?php
                $query = mysqli_query($connection, "select * from tbl_category");
                $count = mysqli_num_rows($query);              
                echo $count;
                ?>
                </h3>              
                <p>Total Category</p>
                </css>
              </div>
              <css style="color:grey">
              <div class="icon">
                <i class="fas fa fa-tablet"></i>
              </div>
              </css>
            </div>
          </div>
        </a>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- feedback small box -->
        <a href="display-stock.php">
          <div class="small-box bg-danger">
            <div class="inner">
              <css style='color: white;'>
                <h3><?php
                $query = mysqli_query($connection, "select * from tbl_stock");
                $count = mysqli_num_rows($query);              
                echo $count;
                ?></h3>
                <p>Total Stock</p>
              </css>
              </div>
              <css style="color: grey;">
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              </css>
            </div>
          </div>
        </a>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title" >
                <i class="fas fa-chart-pie mr-1"></i>
                Stock Available</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           
            <!--/.direct-chat -->

            <!-- TO DO List -->
           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
            
            <!-- /.card -->

            <!-- Calendar -->
            
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script>
  $(function () {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  });
  </script>

<script>
    var donutData = {
      labels: [
        <?php $q = mysqli_query($connection,"select * from tbl_category");
        while($data = mysqli_fetch_array($q)){
        echo "'{$data['category_name']}',";
        }
        ?>
        
      ],
      datasets: [
        {
          data: [<?php $q = mysqli_query($connection,"select  count(*) from tbl_product  group by category_id");
          $count  = mysqli_num_rows($q);
          $i=0;
        while($data = mysqli_fetch_array($q)){
        

            echo "{$data[0]},";
        
        }
        ?>],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#add8e6'],
        }
      ]
    }
  </script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
