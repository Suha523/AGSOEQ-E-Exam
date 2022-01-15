<?php
include("connectDB.php");

$qId=$_GET['qId'];

$sql="DELETE FROM questions WHERE qId='$qId'";

mysqli_query($conn, $sql);
   
header("location: ../teacher/showQuestions.php");