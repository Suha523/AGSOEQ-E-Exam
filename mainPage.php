<?php

include("handlers/connectDB.php");
include("handlers/show_courses.php");
include("includes/header.php");
?> 



 <!-- Main Sidebar Container -->
 <aside class="main-sidebar bg-purple elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link"> -->
      <img src="assets/img/Online-examination-system-e1541573657726.jpg" alt="Online-examination-system Logo" class="brand-image elevation-3" style="opacity: .8" width="100%" height="120">
      <span class="brand-link"></span>
    <!-- </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white"><?php echo $_SESSION['fName']." ".$_SESSION['lName']?></a>
        </div>
      </div>
    </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-sitemap nav-icon text-white"></i>
              <p class="text-white">
                Navigation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-home nav-icon text-white"></i>
                  <p class="text-white">Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-calendar nav-icon text-white"></i>
                  <p class="text-white">Calendar</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cog nav-icon text-white"></i>
              <p class="text-white">
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-edit nav-icon text-white"></i>
                  <p class="text-white">Edit Personal Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-highlighter nav-icon text-white"></i>
                  <p class="text-white">Change Theme</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
                <a href="handlers/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon text-white"></i>
                  <p class="text-white">Logout</p>
                </a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    
    <!-- /.sidebar -->
   </aside>

 <!-- Content Wrapper. Contains page content -->
 
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h1 class="m-0">Dashboard</h1>     
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="m-0">Courses</h3>     
              </div>
             
              <div class="card-body">
             

              <div class="content">
          <div class="container-fluid">
            <div class="row">
              <?php
                    while( $course=mysqli_fetch_array($query)){
                        ?>
                        <div class="col-lg-4 h-25 mb-3">
                          <a href="handlers/to_coursePage.php?subId=<?=$course['subId']?>&subName=<?=$course['subName']?>" class="text-dark"> 
                              <div class="card-group">
                                <div class="card">
                                  <img class="card-img-top" src="assets/img/car-2000x800_1600x.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $course['subName']?></h5>
                                    </div>
                                </div>
                              </div>
                          </a>
                      </div>
                    <?php 
                    }
              ?>
            
            </div>
          
          </div>
        </div>
              </div>
            </div>
            <!-- <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
              
            </div> -->
          </div><!-- /.container-fluid -->
        </div>
    
        <!-- /.content-header -->

        <!-- Main content -->
       
        </div>
      


 <!-- Control Sidebar -->
      <!-- <aside class="control-sidebar control-sidebar-dark">
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside> -->
 
</div>
 



<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
</body>
</html>
