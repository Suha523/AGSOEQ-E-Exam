
<?php
session_start();
$subId=$_SESSION['subId'];
$sql="SELECT * FROM exams WHERE subId='$subId'";
$q=mysqli_query($conn, $sql);


// header("location: ../coursePage.php");
?> 

