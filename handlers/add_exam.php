<?php
session_start();
include("connectDB.php");
$totalMark=0;
$eName=$_POST['eName'];
$eDate=$_POST['eDate'];
$eStartT=date("G:i:sa", strtotime($_POST['eStartT'])) ;
$eEndT=date("G:i:sa", strtotime($_POST['eEndT'])) ;
$tId=$_SESSION['tId'];
$subId=$_SESSION['subId'];

if($eName!="" && $eDate!=" " && $eStartT!="" && $eEndT!=""){
    
    $sql="INSERT INTO exams(`date`, startTime, endTime, tId, subId, eName, totalmark) 
    VALUES ('$eDate','$eStartT','$eEndT','$tId','$subId','$eName','$totalMark')";

        if(mysqli_query($conn, $sql)){
            $_SESSION['totalMark']=$totalMark;
            $_SESSION['eName']=$eName;
            $_SESSION['eDate']=$eDate;
            $_SESSION['eStartT']=$eStartT;
            $_SESSION['eEndT']=$eEndT;
            $_SESSION['success']="The Exam Is Added Successfuly";
            header("location: ../teacher/addExam.php");

        }

}else{
    $_SESSION['error']="Please Fill All Fields";
    header("location: ../teacher/addExam.php");
}


