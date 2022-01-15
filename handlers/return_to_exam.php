<?php
session_start();
include("connectDB.php");
$stuId=$_SESSION['stuId'];
$eId=$_SESSION['eId'];
$page=$_SESSION['page'];
$page=$page-1;
$_SESSION['page']=$page;
if(isset($_GET['pqId'])){
       
    $pqId=$_GET['pqId'];
    $sql="SELECT stuAnswer FROM stuanswers WHERE eId='$eId' and qId='$pqId' and stuId='$stuId'";
    $query=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($query);
    if($rows>0){
        $pre_answer= mysqli_fetch_array($query);
        $pre_answer=$pre_answer['stuAnswer'];
        $_SESSION['preAnswer']=$pre_answer;
    }
    
}
header("location: ../student/startExam.php?page=$page");
