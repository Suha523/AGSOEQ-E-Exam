<?php

session_start();
include("connectDB.php");
$stuId=$_SESSION['stuId'];
$eId=$_SESSION['eId'];
$sql="INSERT INTO states (eId, stuId, `status`)
VALUES ('$eId','$stuId',1)";

if(mysqli_query($conn, $sql)){
    $_SESSION['state']="1";
    header("location: ../student/startExam.php");

}else{
   echo "error";
}