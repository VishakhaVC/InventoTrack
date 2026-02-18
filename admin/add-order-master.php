<?php
session_start();
include './themepart/database-connect.php';

if ($_POST) {
  $date = $_POST['txt1'];
  $userid = $_POST['txt2'];
  $status = $_POST['txt3'];
  

  $query = mysqli_query($connection, "insert into tbl_order_master(order_date,user_id,order_master_status) 
values('{$date}','{$userid}','{$status}')");


  if ($query) {
    echo "<script>alert('Record Added');window.location='add-order-master.php';</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_ADMIN_ADD_ORDER_MASTER</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    include './themepart/header.php';
    include './themepart/left-sidebar.php';
    include './themepart/preloader.php';

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
              <h1>ORDER MASTER</h1>
            </div>
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">ADD ORDER</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="myform">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputDate">Order Date</label>
                      <input type="date" class="form-control" autocomplete="off" name="txt1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUserID">User</label>
                      
                      <?php
                      $dropquery = mysqli_query($connection, "select * from tbl_user");
                      echo"<select name='txt2' class='form-control' required>";
                      echo "<option value=''>---Select---</option>";
                      while($droprow = mysqli_fetch_array($dropquery))
                      {
                        echo "<option value='{$droprow['user_id']}'>{$droprow['user_fullname']}</option>";
                      }
                      echo "</select>";                    
                      ?>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputStatus">Status</label>
                      <input type="text" class="form-control" autocomplete="off" name="txt3" required>
                    </div>
                   
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary"> Add </button>

                      <button type="reset" class="btn btn-warning">Reset</button>

                    </div>
                </form>
              </div>
              <!-- /.card -->

              <!-- general form elements -->

              <!-- /.card -->

              <!-- Input addon -->

              <!-- /.card -->
              <!-- Horizontal Form -->

              <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include './themepart/footer.php';
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
  <script src="../../plugins/jjquery-validation/jquery.validate.js"></script>
                      <script>
                        $(document).ready(function(){
                          $("#myform").validate();
                        });
                        </script>
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