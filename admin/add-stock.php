<?php
session_start();
include './themepart/database-connect.php';

if ($_POST) {

  $productid = $_POST['txt1'];
  $quantity = $_POST['txt2'];
  $price = $_POST['txt3'];

  $query = mysqli_query($connection, "insert into tbl_stock(product_id,stock_quantity,stock_price) 
  values('{$productid}','{$quantity}','{$price}')");

  if ($query) {
    echo "<script>alert('Stock Added');window.location='add-stock.php';</script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_ADMIN_ADD_STOCK</title>

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
              <h1>STOCK</h1>
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
                  <h3 class="card-title">ADD STOCK</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="myform">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputProductID">Product</label>

                      <?php
                      $dropquery = mysqli_query($connection, "select * from tbl_product");
                      echo "<select name='txt1' class='form-control' required>";
                      echo "<option value=''>---Select---</option>";
                      while ($droprow = mysqli_fetch_array($dropquery)) {
                        echo "<option value='{$droprow['product_id']}'>{$droprow['product_name']}</option>";
                      }
                      echo "</select>";
                      ?>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputQuantity">Quantity</label>
                      <input type="text" class="form-control" autocomplete="off" name="txt2" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPrice">Price</label>
                      <input type="number" class="form-control" autocomplete="off" name="txt3" required>
                    </div>
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
  <!-- jquery-validation -->
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#myform").validate(
        {
          rules: {
            txt1: "required",
            txt2: "required",
            txt3: "required",
          },
          messages: {
            txt1: "Select type",
            txt2: "*Please enter quantity",
            txt3: "*Please enter price",
          },
        }
      );
    });
  </script>
  <style>
    .error {
      color: red;
    }
  </style>
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