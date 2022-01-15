<?php
   session_start();
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
  <title>Log In</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>

    <div class="container p-5">
       <div class="row">
           <div class="col-lg-6">
                <div class="card h-80">
               
                <!-- <div class="rounded-circle m-auto bg-img">
                  
                </div> -->
                <h2 class=" text-center mt-5" style="color: rgb(72, 16, 121);">Log In</h2>  
                    <div class="card-body p-5">
                        <?php
                           if(isset($_SESSION['error'])){
                               ?>
                               <div class="alert alert-danger alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <?php
                             echo $_SESSION['error'];
                             unset($_SESSION['error']);
                           ?>
                           </div>
                           <?php
                           }
                        
                        ?>
                        
                    <form method="post" action="handlers/handle_login.php">
                        <div class="form-group">
                            <label class="text-orange">User Name</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                   <div class="input-group-text bg-purp">
                                       <i class="fas fa-user text-orange"></i>
                                   </div>
                                </div>
                                <input type="text" name="username" class="form-control">
                            </div>               
                        </div>
                        <div class="form-group">
                            <label class="text-orange">Password</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                   <div class="input-group-text bg-purp">
                                       <i class="fas fa-key text-orange"></i>
                                   </div>
                                </div>
                                <input type="password" name="password" class="form-control">
                            </div>   
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-orange" for="exampleCheck1">Remember Me</label>
                        </div>
                        <button type="submit" class="btn bg-purp"><p class="text-orange d-inline">Log In</p></button>
                </form>
                    </div>
                </div>
        </div>

        <div class="col-lg-6">
            <div>
                <div class="card-body">
                    <img src="assets/img/hh.png" width="100%" height="100%" alt="online exam" >
                </div>
            </div>
        </div>
        </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
</body>
</html>

