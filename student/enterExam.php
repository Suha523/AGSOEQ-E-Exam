<?php
  session_start();
  if(!isset($_SESSION['stuId'])){
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
  <title>Log In</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>

    <div class="container mt-5">
       <div class="row">
           <div class="col-lg-7">
                <div class="card pt-1 h-80">
              
                    <div class="card-header">
                        <h2><?=$_SESSION['eName']?></h2>
                    </div>
                    
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                           <h4 class="mb-5">Attempts allowed: 1</h4>
                           <?php
                             $eId=$_SESSION['eId'];
                             
                           ?>
                           <a href="../handlers/start_submit.php?eId=<?=$eId?>" class="btn btn-primary ml-3">Attempt Quiz Now</a>
                        </div>
                      

                    </div>
                    
                   
                
                </div>
            </div>

     
        </div>
</div>

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
</body>
</html>

