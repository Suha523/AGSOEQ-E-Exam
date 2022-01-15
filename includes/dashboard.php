
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div> -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">


          
           <!-- show courses from database -->

           <?php
          
                while( $course=mysqli_fetch_array($query)){
                    ?>
                  
                    <div class="col-lg-4 h-25 mb-3">
                    <a href="coursePage.php" class="text-dark"> 
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
             
           
         
          
         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>