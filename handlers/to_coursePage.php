
<?php
session_start();
$_SESSION['subId']=$_GET['subId'];
$_SESSION['subName']=$_GET['subName'];

header("location: ../coursePage.php");
?> 

