<?php
include './themepart/database-connect.php';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">InventoTrack</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/manager.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <css class="d-block" style="color: white;">            
            <?php 
            if(isset($_SESSION['mid']))
            {
              echo "<i>Welcome,  </i>".$_SESSION['managername'];
            }else
            {
              echo "<i>Welcome,  </i>".$_SESSION['adminname'];
            } 
            ?>
            </css>          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
    
    <!--- Managaer Menu-->
      <?php 

if(isset($_SESSION['mid']))
{
  ?>
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="manager-dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           

          <!-- MANAGER -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="add-manager.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add manager</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="display-manager.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Manager</p>
                </a>
              </li>
            </ul>
          </li>

            <!-- CATEGORY -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-tablet"></i>
            <p>
              Manage Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add-category.php" class="nav-link">
                <i class="fa fa-plus-circle"></i>
                <p>Add Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="display-category.php" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>Display Category</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- PRODUCT -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-laptop"></i>
            <p>
              Manage Product
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add-product.php" class="nav-link">
                <i class="fa fa-plus-circle"></i>
                <p>Add Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="display-product.php" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>Display Product</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- SALES -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Manage Sales
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-plus-circle"></i>
                <p>Add Sales</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="display-order-details.php" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>Display Sales</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- GENERATE REPORT -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Generate Report
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="get-report.php" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>Product Report</p>
              </a>
            </li>

          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="get-order.php" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>Order Report</p>
              </a>
            </li>

          </ul>
        </li>
            </ul>
          </li>
          
          </li>
        </ul>
      </nav>

<?php

}else{
?>
    
    <!--- Admin Menu-->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="admin-dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
            <!-- ADMIN -->
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="add-admin.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Admin</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="display-admin.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Admin</p>
                </a>
              </li>
            </ul>
          </li>


            <!-- USER -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="add-user.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add User</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="display-user.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display User</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- CATEGORY -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-tablet"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="add-category.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Category</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="display-category.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Category</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- PRODUCT -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-laptop"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="add-product.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Product</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="display-product.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Product</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- ORDER(ORDER_MASTER, ORDER_DETAILS) -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-shopping-cart"></i>
              <p>
                Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="display-order-master.php" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Display Order_Master
                  <!-- <i class="fas fa-angle-left right"></i> -->
                  </p>
                </a>

                <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-order-master.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Order_Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display-order-master.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Order_Master</p>
                </a>
              </li>
            </ul> -->

              </li>
              <li class="nav-item">
                <a href="display-order-details.php" class="nav-link">
                  <i class="fa fa-info-circle"></i>
                  <p>Display Order_Details
                  <!-- <i class="fas fa-angle-left right"></i> -->
                  </p>
                </a>
            
              <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-order-details.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Order_Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display-order-details.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Order_Details</p>
                </a>
              </li>
            </ul>
           -->
            </li>
            </ul>
          </li>

          <!-- STOCK -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Stock
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-stock.php" class="nav-link">
                  <i class="fa fa-plus-circle"></i>
                  <p>Add Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display-stock.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>Display Stock</p>
                </a>
              </li>
            </ul>
            
          </li>

          <!-- FEEDBACK -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-comments"></i>
              <p>
                Feedback
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view-feedback.php" class="nav-link">
                  <i class="fa fa-eye"></i>
                  <p>View Feedback</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
          
          </li>
        </ul>
      </nav>

      <?php

}
?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>