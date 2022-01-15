<?php
session_start();
include("connectDB.php");
$eId=$_SESSION['eId'];
$sql1="SELECT eId, SUM(qNummark) AS totalMark FROM questions GROUP BY (eId) HAVING eId='$eId' ";
$q1=mysqli_query($conn, $sql1);
$getRow=mysqli_fetch_array($q1);
$totalMark= $getRow['totalMark'];
$sql2="UPDATE exams SET totalmark='$totalMark' WHERE eId='$eId'";
        if(mysqli_query($conn, $sql2)){
            $_SESSION['totalMark']=$totalMark;
            header("location: ../coursePage.php");
        }else{
            echo "error";
        }

    