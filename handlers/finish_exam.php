<?php

session_start();
include("connectDB.php");
$stuId=$_SESSION['stuId'];
$eId=$_SESSION['eId'];
$sql="INSERT INTO states (eId, stuId, `status`)
VALUES ('$eId','$stuId',2)";

if(mysqli_query($conn, $sql)){
    $_SESSION['state']="2";
    header("location: ../coursePage.php");

}else{
   echo "error";
}