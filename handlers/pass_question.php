<?php
session_start();
// $qId=$_GET['qId'];
$_SESSION['qId']=$_GET['qId'];
$_SESSION['question']=$_GET['question'];
$_SESSION['answer']=$_GET['answer'];
$_SESSION['mark']=$_GET['mark'];

header("location: ../teacher/updateQuestion.php");