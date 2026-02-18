<?php
session_start();
include'./themepart/database-connect.php';

$id = $_GET['eid'];
   if(!isset($_GET['eid'])){
       header('location:display-stock.php');
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InventoTrack_ADMIN_EDIT_STOCK</title>

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

//select
$selectquery = mysqli_query($connection, "select * from tbl_stock where stock_id='{$id}'");
$row = mysqli_fetch_array($selectquery);

//update
    if ($_POST) {

    $productid = $_POST['txt1'];
    $quantity = $_POST['txt2'];
    $price = $_POST['txt3']; 

    $updatequery = mysqli_query($connection, "update tbl_stock set 
        product_id='{$productid}',stock_quantity='{$quantity}',stock_price='{$price}'
        where stock_id='{$id}'");

        if($updatequery){
            echo "<script>alert('Stock Updated');window.location='display-stock.php';</script>";
        }
  
  }
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
              <li class="breadcrumb-item active">Edit Form</li>
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
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"><b>EDIT STOCK</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputProductID">Product</label>
                    
                    <?php
                      $dropquery = mysqli_query($connection, "select * from tbl_product");
                      echo"<select name='txt1' class='form-control' required>";
                      while($droprow = mysqli_fetch_array($dropquery))
                      {
                        $select = $droprow['product_id'] == $row['product_id'] ? " selected " :"";
                        echo "<option value='{$droprow['product_id']}' $select>{$droprow['product_name']}</option>";
                      }
                      echo "</select>";                    
                      ?>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputQuantity">Quantity</label>
                    <input type="text" class="form-control" value="<?php echo $row['stock_quantity']; ?>" name="txt2" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="number" class="form-control" value="<?php echo $row['stock_price']; ?>" name="txt3" required>
                  </div>    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"> Update </button>

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
<script src="../../plugins/jjquery-validation/jquery.validate.js"></script>
                      <script>
                        $(document).ready(function(){
                          $("#myform").validate();
                        });
                        </script>
                        <style>
                          .error{color: red;}
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
