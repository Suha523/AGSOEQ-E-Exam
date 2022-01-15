
<?php
session_start();
include("connectDB.php");
$qId=$_SESSION['qId'];
$question=$_POST['question'];
$answer=$_POST['answer'];
$mark=$_POST['mark'];

$sql="UPDATE questions SET qText='$question', qAnswer='$answer', qNummark='$mark' WHERE qId='$qId'";
if(mysqli_query($conn, $sql)){
    header("location: ../teacher/showQuestions.php");
}