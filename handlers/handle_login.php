<?php
session_start();
include ("connectDB.php");
$username=$_POST['username'];
$password=$_POST['password'];

$sql1 ="SELECT * FROM teachers WHERE tUsername='$username'";
$query1=mysqli_query($conn, $sql1);
$data=mysqli_fetch_array($query1);
$tCount=mysqli_num_rows($query1);
if($tCount > 0){
   if($password==$data['tPassword']){
        $_SESSION['tUsername']=$data['tUsername'];
        $_SESSION['fName']=$data['fName'];
        $_SESSION['lName']=$data['lName'];
        $_SESSION['tId']=$data['tId'];
        header("location: ../mainPage.php");
   }else{
        $_SESSION['error']="Invalid Password";
        header("location: ../index.php");
   }
    
}else{
    $sql2 ="SELECT * FROM students WHERE stuUsername='$username'";
    $query2=mysqli_query($conn, $sql2);
    $data1=mysqli_fetch_array($query2);
    $sCount=mysqli_num_rows($query2);
    if($sCount > 0){
      if($password==$data1['stuPassword']){
            $_SESSION['stuUsername']=$data1['stuUsername'];
            $_SESSION['fName']=$data1['fName'];
            $_SESSION['lName']=$data1['lName'];
            $_SESSION['stuId']=$data1['stuId'];
            header("location: ../mainPage.php");
      }else{
        $_SESSION['error']="Invalid Password";
        header("location: ../index.php");
      }
        
}else{
    $_SESSION['error']="Invalid Username";
    header("location: ../index.php");
    }
}