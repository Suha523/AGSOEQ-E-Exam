<?php
session_start();
if(!isset($_SESSION['stuId'])){
    header("location: ../handlers/logout.php");
}
include("../handlers/connectDB.php");
$eId=$_SESSION['eId'];
$sql="SELECT * FROM questions WHERE eId='$eId'";
$query = mysqli_query($conn, $sql);

$questions=mysqli_fetch_all($query);


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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3>Online Exam</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pr-4" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark"><?=$_SESSION['fName']?> <?=$_SESSION['lName']?></a>
                </li>
                <li class="nav-item">
                    <a href="../handlers/logout.php" class="nav-link text-dark"><i
                            class="fas fa-sign-out-alt mr-1"></i>Exit Exam</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="card pt-1">

                    <div class="card-header">
                        <h2><?=$_SESSION['eName']?></h2>
                    </div>

                    <div class="card-body">
                        <?php 
                       $page=$_SESSION['page'];
                        foreach($questions as $index=>$question){
                          
                          if($_GET['page']==$index+1){?>
                        <div class="card">
                            <div class="card-body">
                                <form method="post"
                                    action="../handlers/add_answer.php?qId=<?=$question['0']?>&pqId=<?=$question['0']-1?>&nqId=<?=$question['0']+1?>">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Q<?=$index+1?>. <?=$question['1']?></label>
                                                <textarea name="answer" class="form-control" rows="7"
                                                    placeholder="Enter Answer">
                                         <?php 
                                         if(isset($_SESSION['preAnswer'])){
                                          echo trim($_SESSION['preAnswer']);
                                          unset($_SESSION['preAnswer']);
                                          // unset($_GET['page']);
                                         }
                                         if(isset($_SESSION['nextAnswer'])){
                                          echo trim($_SESSION['nextAnswer']);
                                          unset($_SESSION['nextAnswer']);
                                          // unset($_GET['page']);
                                         }
                                         if(isset($_SESSION['curAnswer'])){
                                          echo trim($_SESSION['curAnswer']);
                                          unset($_SESSION['curAnswer']);
                                          // unset($_GET['page']);
                                         }
                                        //  if($index+1==1){
                                        //   echo trim($_SESSION['firstAnswer']);
                                        //   unset($_SESSION['firstAnswer']);
                                        //   // unset($_GET['page']);
                                        //  }
                                        
                                         ?>
                                        </textarea>

                                            </div>
                                        </div>
                                        <?php 

                                      if($page>1){ ?>
                                        <button type="submit" name="pre"
                                            class="btn btn-primary mr-auto">Previous</button>
                                        <?php } ?>


                                        <button type="submit" name="next" class="btn btn-primary ml-auto">Next</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <?php }
                         }
                     ?>

                        <?php 
                        $eId=$_SESSION['eId'];
                 if($page>mysqli_num_rows($query)){?>
                        <div class="card">

                            <div class="card-body d-flex justify-content-center">
                                <div>
                                    <a href="../handlers/return_to_exam.php?page=<?=$page?>&pqId=<?=$question['0']?>"
                                        class="btn btn-primary  d-block mb-4">Return to Exam</a>
                                    <a href="../handlers/finish_exam.php"
                                        class="btn btn-primary d-block mb-4">Finish</a>
                                </div>

                            </div>
                        </div>
                        <?php }?>

                    </div>



                </div>
            </div>
            <div class="col-lg-3">
                <div class="card p-3 ">
                    <div class="card">
                        <div class="card-header bg-purple text-center">
                            Remaining Time
                        </div>
                        <div class="card-body">
                            <div id="RemainingTime">

                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <?php
                        foreach($questions as $index=>$question){?>
                        <li class="d-inline"><a
                                href="../handlers/go_to_question.php?qId=<?=$question[0]?>&index=<?=$index+1?>"
                                class="btn btn-outline-info"><?=$index+1?></a></li>
                        <?php }
                    ?>
                    </ul>

                </div>


            </div>

        </div>
    </div>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->

    <script src="../assets/js/adminlte.min.js"></script>
    <script>
    // Set the date we're counting down to
    // let d=

    var eDate =  "<?= date($_SESSION['date']) ?>";
    // console.log(eDate);
    // var options = { hour12: false }
    var date=eDate.split("-");
    // console.log(date);
    var y=date[0];
    var mo=date[1];
    var d=date[2];
    // console.log(y+"-"+mo+"-"+d);
    var eTime = "<?= date($_SESSION['etime'])?>";
    var time=eTime.split(":");
    // console.log(time);
    var h=time[0];
    var m=time[1];
    var s=time[2];
    // console.log(h+":"+m+":"+s);
    var countDownDate = new Date(`${y}`,`${mo}`,`${d}`,`${h}`,`${m}`,`${s}`).getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {

        //   // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance =  countDownDate - now ;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("RemainingTime").innerHTML = hours + ":" +
            minutes + ":" + seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("RemainingTime").innerHTML = "EXPIRED";
        }
    }, 1000);
    </script>


</body>

</html>