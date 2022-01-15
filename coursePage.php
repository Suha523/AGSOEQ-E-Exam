<?php
 include("handlers/connectDB.php");
 include("handlers/show_exams.php");
 include("includes/header.php");
 
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-purple elevation-4 ">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link"> -->
    <img src="assets/img/Online-examination-system-e1541573657726.jpg" alt="Online-examination-system Logo"
        class="brand-image elevation-3" style="opacity: .8" width="100%" height="120">
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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <h4 class="card-header"><?php echo $_SESSION['subName']?> </h4>
             
            <?php
      if(isset($_SESSION['tId'])){?>
            <div class="pr-2 ml-auto mt-2">
                <a href="teacher/addExam.php">
                    <h5 class=" text-dark"><i class="fas fa-plus"></i> Add Exam</h5>
                </a>
            </div>
            
            <!-- <div class="card-body"> -->
           

            <div class="card-body mt-3">
           
                <?php
         if(mysqli_num_rows($q)==0){?>
                <div class="card">
                    <h4 class="card-header text-danger"><?php echo "No Exams Added Yet"?> </h4>
                </div>
                <?php
         }else{
      ?>

                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="text-center">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Exam
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Duration
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            Total Mark
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                     while($exam=mysqli_fetch_array($q)){
                      
                     ?>

                                    <tr class="text-center">
                                        <th rowspan="1" colspan="1"><?=$exam['eName']?></th>
                                        <th rowspan="1" colspan="1"><?=$exam['date']?></th>
                                        <th rowspan="1" colspan="1">
                                            <?=intval($exam['endTime'])-intval($exam['startTime'])?></th>
                                        <th rowspan="1" colspan="1"><?=$exam['totalmark']?></th>
                                        <th rowspan="1" colspan="1">
                                            <?php 
                          if(date("Y-m-d h:i:sa") < $exam['date']){?>
                                            <span class="badge badge-success">Upcomming</span>
                                            <?php }else{?>
                                            <span class="badge badge-danger">Expired</span>

                                            <?php }
                      ?>
                                        </th>
                                        <td rowspan="1" colspan="1">
                                            <?php
                          if(date("Y-m-d h:i:sa") < $exam['date']){?>
                                            <?php
                                if($exam['totalmark']==0){?>
                                            <a href="handlers/delete_exam.php?eId=<?=$exam['eId']?>"
                                                data-toggle="tooltip" data-placement="top" title="delete exam"
                                                class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>

                                            <?php }else{?>
                                            <a style="pointer-events: none; display: inline-block; opacity:0.4;"
                                                href="handlers/delete_exam.php?eId=<?=$exam['eId']?>"
                                                data-toggle="tooltip" data-placement="top" title="delete exam"
                                                class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>

                                            <?php }
                             ?>
                                            <a href="handlers/pass_exam.php?type=add&eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&eDate=<?=$exam['date']?>&eStartT=<?=$exam['startTime']?>&eEndT=<?=$exam['endTime']?>" class="
                                                btn btn-success mr-2" data-toggle="tooltip" data-placement="top"
                                                title="add question"><i class="fas fa-plus"></i></a>

                                            <a href="handlers/pass_exam.php?type=edit&eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&eDate=<?=$exam['date']?>&eStartT=<?=$exam['startTime']?>&eEndT=<?=$exam['endTime']?>" class="btn btn-warning mr-2" data-toggle="tooltip"
                                                data-placement="top" title="edit exam"><i class="fas fa-edit"></i></a>
                                            <?php }else{?>
                                            <a style="pointer-events: none; display: inline-block; opacity:0.4;"
                                                href="handlers/delete_exam.php?eId=<?=$exam['eId']?>"
                                                data-toggle="tooltip" data-placement="top" title="delete exam"
                                                class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
                                            <a style="pointer-events: none; display: inline-block; opacity:0.4;"
                                                href="handlers/pass_exam.php?type=add&eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&eDate=<?=$exam['date']?>&eStartT=<?=$exam['startTime']?>&eEndT=<?=$exam['endTime']?>" class="
                                                btn btn-success mr-2" data-toggle="tooltip" data-placement="top"
                                                title="add question"><i class="fas fa-plus"></i></a>
                                            <a style="pointer-events: none; display: inline-block; opacity:0.4;"
                                                href="#" class="btn btn-warning mr-2" data-toggle="tooltip"
                                                data-placement="top" title="edit exam"><i class="fas fa-edit"></i></a>

                                            <?php }
                        ?>
                                            <a href="handlers/pass_exam.php?type=show&eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&eDate=<?=$exam['date']?>&eStartT=<?=$exam['startTime']?>&eEndT=<?=$exam['endTime']?>" class="
                                                btn btn-info mr-2" data-toggle="tooltip" data-placement="top"
                                                title="show questions"><i class="fas fa-list-ul"></i></a>

                                            <a href="handlers/pass_exam.php?type=showg&eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&totalMark=<?=$exam['totalmark']?>&eDate=<?=$exam['date']?>&eStartT=<?=$exam['startTime']?>&eEndT=<?=$exam['endTime']?>" class="btn btn-primary" data-toggle="tooltip"
                                                data-placement="top" title="show grades">
                                                <i class="fas"><img src="assets/img/grade.png" /></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                  }
                  ?>

                                </tbody>
                                <tfoot>
                                    <tr class="text-center">
                                        <th rowspan="1" colspan="1">Exam</th>
                                        <th rowspan="1" colspan="1">Date</th>
                                        <th rowspan="1" colspan="1">Duration</th>
                                        <th rowspan="1" colspan="1">Total Mark</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
                
                    <?php
      }?>
                    <a href="mainPage.php" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Return</a>
                    </div>
                    <!-- <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                  Showing 1 to 10 of 57 entries
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                  <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="example1_previous">
                      <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">
                        Previous
                      </a>
                    </li>
                    <li class="paginate_button page-item active">
                      <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
                </div>
          </div> -->

                    <?php
    }
  else{ ?>
          
                    <div class="card m-3">
                   
                   <div class="card-header">
                       
                   <a href="showGrades.php" class="btn btn-info" data-toggle="tooltip" 
                   data-placement="top" title="show grades">
                     <i class="fas"><img src="assets/img/grade.png" /></i>
                   </a>
                   </div>
                        <div class="card-body mt-3">
                        
                            <ul class="list-unstyled">
                                <?php
                                if(mysqli_num_rows($q)==0){?>
                                    <div class="card">
                                    <h4 class="card-header text-danger"><?php echo "No Exams Added Yet"?> </h4>
                                </div>
                               <?php  }
          while($exam=mysqli_fetch_array($q)){?>
                                <li class="mb-3">
                                    <img src="assets/img/exam_icon.png" class="mr-2" alt="" />
                                    <a href="handlers/enter_exam.php?eId=<?=$exam['eId']?>&eName=<?=$exam['eName']?>&eDate=<?=$exam['date']?>&sTime=<?=$exam['startTime']?>&eTime=<?=$exam['endTime']?>" class="text-dark"><?=$exam['eName']?></a>
                                   
                                </li>
                                <?php
          }

       ?>

                            </ul>
                            <a href="mainPage.php" class="btn btn-primary mt-5"><i class="fas fa-arrow-left mr-2"></i>Return</a>
                           
                        </div>

                    </div>
                    <?php   
  }
     
 
        
    ?>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.content -->

            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">

                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>
    <script src="assets/js/custom.js"></script>
    </body>

    </html>