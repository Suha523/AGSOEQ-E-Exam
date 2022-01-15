<?php
session_start();
include("connectDB.php");
$stuId=$_SESSION['stuId'];
$eId=$_SESSION['eId'];
$page=$_SESSION['page'];
$page=$_GET['index'];
$_SESSION['page']=$page;
if(isset($_GET['qId'])){
       
    $qId=$_GET['qId'];
    $sql="SELECT stuAnswer FROM stuanswers WHERE eId='$eId' and qId='$qId' and stuId='$stuId'";
    $query=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($query);
    if($rows>0){
        $cur_answer= mysqli_fetch_array($query);
        $cur_answer=$cur_answer['stuAnswer'];
        $_SESSION['curAnswer']=$cur_answer;
    }
    
}
header("location: ../student/startExam.php?page=$page");
