<?php
session_start();
$_SESSION['eId']=$_GET['eId'];
$_SESSION['page']=1;
$page=$_SESSION['page'];
header("location: ../student/startExam.php?page=$page");
?>

