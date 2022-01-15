<?php
session_start();
include("connectDB.php");
$eId=$_SESSION['eId'];
$eName=$_POST['eName'];
$eDate=$_POST['eDate'];
$eStartT=$_POST['eStartT'];
$eEndT=$_POST['eEndT'];
$sql="UPDATE exams SET eName='$eName', `date`='$eDate', startTime='$eStartT',endTime='$eEndT'
WHERE eId='$eId'";

if(mysqli_query($conn, $sql)){
    $_SESSION['eDate']=$eDate;
    $_SESSION['eStartT']=$eStartT;
    $_SESSION['eEndT']=$eEndT;

    header("location: ../coursePage.php");
}