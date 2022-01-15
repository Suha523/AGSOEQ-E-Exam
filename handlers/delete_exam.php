<?php
include("connectDB.php");

$eId=$_GET['eId'];

$sql="DELETE FROM exams WHERE eId='$eId'";

mysqli_query($conn, $sql);
   
header("location: ../coursePage.php");