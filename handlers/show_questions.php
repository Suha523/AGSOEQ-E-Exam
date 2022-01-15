
<?php
session_start();
$eId=$_SESSION['eId'];
$sql="SELECT * FROM questions WHERE eId='$eId'";
$q=mysqli_query($conn, $sql);


// header("location: ../coursePage.php");
?> 

