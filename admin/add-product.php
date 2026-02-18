<?php
session_start();
include './themepart/database-connect.php';

if (isset($_POST['btnsubmit'])) {

  //photo-file
  $filename = $_FILES['txt7']['name'];
  $filesource = $_FILES['txt7']['tmp_name'];
  //form add
  $productid = $_POST['txt1'];
  $productname = $_POST['txt2'];
  $details = $_POST['txt3'];
  $price = $_POST['txt4'];
  $quantity = $_POST['txt5'];
  $categoryid = $_POST['txt6'];


  $query = mysqli_query($connection, "insert into tbl_product(product_id, product_name, product_details, product_price, product_quantity, category_id, product_image) 
values('{$productid}','{$productname}','{$details}','{$price}','{$quantity}','{$categoryid}','{$filename}')");

  //file-upload
  move_uploaded_file($filesource, "./uploads/" . $filename);

  if ($query) {
    echo "<script>alert('Product Added');window.location='add-product.php';</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_MANAGER_ADD_PRODUCT</title>

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
              <h1>PRODUCT</h1>
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
                  <h3 class="card-title">ADD PRODUCT</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" id="myform">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputProductID">ID</label>
                      <input type="text" class="form-control" autocomplete="off" name="txt1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputProductName">Name</label>
                      <input type="text" class="form-control" autocomplete="off" name="txt2" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputProductDetails">Details</label>
                      <input type="text" class="form-control" autocomplete="off" name="txt3" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputProductPrice">Price</label>
                      <input type="number" class="form-control" autocomplete="off" name="txt4" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputProductQuantity">Quantity</label>
                      <input type="number" class="form-control" autocomplete="off" name="txt5" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCategoryID">Category</label>

                      <?php
                      $dropquery = mysqli_query($connection, "select * from tbl_category");
                      echo "<select name='txt6' class='form-control' required>";
                      echo "<option value=''>---Select---</option>";
                      while ($droprow = mysqli_fetch_array($dropquery)) {
                        echo "<option value='{$droprow['category_id']}'>{$droprow['category_name']}</option>";
                      }
                      echo "</select>";
                      ?>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputProductQuantity">Photo</label>
                      <input type="file" class="form-control" name="txt7" required>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" name="btnsubmit" class="btn btn-primary"> Add </button>

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
  <!-- jquery-validation -->
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>


  <script>
    $(document).ready(function () {
      $("#myform").validate({
        rules: {
          txt1: "required",
          txt2: "required",
          txt3: "required",
          txt4: "required",
          txt5: "required",
          txt6: "required",
          txt7: "required",
        },
        messages: {
          txt1: "*Enter ID",
          txt2: "*Please enter name",
          txt3: "*Please enter details",
          txt4: "*Please enter price",
          txt5: "*Please enter quantity",
          txt6: "*Select category",
          txt7: "*Please choose photo",
        },
      });
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