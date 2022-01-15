<?php
 include("../handlers/connectDB.php");
 include("../handlers/show_questions.php");
 if(!isset($_SESSION['tId'])){
  header("location: ../handlers/logout.php");
}
?>  

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Dashboard</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="../assets/css/adminlte.min.css">
 <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <!-- <li class="nav-item d-none d-sm-inline-block">
       <a href="index3.html" class="nav-link">Home</a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="#" class="nav-link">Contact</a>
     </li> -->
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Navbar Search -->
     <li class="nav-item">
       <a class="nav-link" data-widget="navbar-search" href="#" role="button">
         <i class="fas fa-search"></i>
       </a>
       <div class="navbar-search-block">
         <form class="form-inline">
           <div class="input-group input-group-sm">
             <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
             <div class="input-group-append">
               <button class="btn btn-navbar" type="submit">
                 <i class="fas fa-search"></i>
               </button>
               <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                 <i class="fas fa-times"></i>
               </button>
             </div>
           </div>
         </form>
       </div>
     </li>

     <!-- Messages Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-comments"></i>
         <span class="badge badge-danger navbar-badge">3</span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <a href="#" class="dropdown-item">
           <!-- Message Start -->
           <div class="media">
             <img src="../assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
             <div class="media-body">
               <h3 class="dropdown-item-title">
                 Brad Diesel
                 <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
               </h3>
               <p class="text-sm">Call me whenever you can...</p>
               <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
             </div>
           </div>
           <!-- Message End -->
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <!-- Message Start -->
           <div class="media">
             <img src="../assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
             <div class="media-body">
               <h3 class="dropdown-item-title">
                 John Pierce
                 <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
               </h3>
               <p class="text-sm">I got your message bro</p>
               <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
             </div>
           </div>
           <!-- Message End -->
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <!-- Message Start -->
           <div class="media">
             <img src="../assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
             <div class="media-body">
               <h3 class="dropdown-item-title">
                 Nora Silvester
                 <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
               </h3>
               <p class="text-sm">The subject goes here</p>
               <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
             </div>
           </div>
           <!-- Message End -->
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
       </div>
     </li>
     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge">15</span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <span class="dropdown-header">15 Notifications</span>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-envelope mr-2"></i> 4 new messages
           <span class="float-right text-muted text-sm">3 mins</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-users mr-2"></i> 8 friend requests
           <span class="float-right text-muted text-sm">12 hours</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-file mr-2"></i> 3 new reports
           <span class="float-right text-muted text-sm">2 days</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
         <i class="fas fa-th-large"></i>
       </a>
     </li>
   </ul>
 </nav>
 <!-- /.navbar -->

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar bg-purp elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link"> -->
      <img src="../assets/img/Online-examination-system-e1541573657726.jpg" alt="Online-examination-system Logo" class="brand-image elevation-3" style="opacity: .8" width="100%" height="120">
      <span class="brand-link"></span>
    <!-- </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white"><?php echo $_SESSION['fName']." ".$_SESSION['lName']?></a>
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
                <a href="../handlers/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon text-white"></i>
                  <p class="text-white">Logout</p>
                </a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content ">
      <div class="container">
        <div class="card">
           <div class="card-header">
              <h4> <?=$_SESSION['eName']?></h4>
           </div>
           <div class="pr-2 ml-auto mt-2">
              <a href="addQuestion.php" ><h5 class=" text-dark" ><i class="fas fa-plus"></i> Add Question</h5></a>
           </div>
           <div class="card-body mt-3">
           <?php
         if(mysqli_num_rows($q)==0){?>
            <div class="card">
               <h4 class="card-header text-danger"><?php echo "No Questions Added Yet"?> </h4>
           </div>
         <?php
         }else{
      ?>
               <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row" class="text-center">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                    Question
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                   Mark
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                   Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($question=mysqli_fetch_array($q)){
                                // $totalMark=$question['totalMark'];
                                ?>
                                <tr class="text-center">
                                <td rowspan="1" colspan="1"><?=$question['qText']?></td>
                                <td rowspan="1" colspan="1"><?=$question['qNummark']?></td>
                                <td rowspan="1" colspan="1">
                                    <a href="../handlers/delete_question.php?qId=<?=$question['qId']?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="delete question"><i class="fas fa-trash-alt"></i></a>
                                    <a href="../handlers/pass_question.php?qId=<?=$question['qId']?>&question=<?=$question['qText']?>&answer=<?=$question['qAnswer']?>&mark=<?=$question['qNummark']?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="edit question"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="show answer"><i class="far fa-eye"></i></a>

                                  </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th rowspan="1" colspan="1">Question</th>
                                <th rowspan="1" colspan="1">Mark</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </tfoot>
                     </table>
                    
             </div>
          </div>
        </div>

        <?php
        }?>
                <a href="../handlers/update_totalMark.php" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Return</a>

    </div>

                </div>
                </div>       
 </div>
                        </div>

<aside class="control-sidebar control-sidebar-dark">
 
   <div class="p-3">
     <h5>Title</h5>
     <p>Sidebar content</p>
   </div>
</aside>
 <!-- /.control-sidebar -->
</div>
<!-- /.container-fluid -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/custom.js"></script>
</body>
</html>
