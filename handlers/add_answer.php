<?php 

session_start();
include("connectDB.php");
$stuId=$_SESSION['stuId'];
$eId=$_SESSION['eId'];
$stuAnswer=$_POST['answer'];
$qId=$_GET['qId'];
if(isset($_POST['next'])){
    $page=$_SESSION['page'];
    $page=$page+1;
    $_SESSION['page']=$page;
    if(isset($_GET['nqId'])){
    
    $nqId=$_GET['nqId'];
    $sql="SELECT stuAnswer FROM stuanswers WHERE eId='$eId' and qId='$nqId' and stuId='$stuId'";
    $query=mysqli_query($conn,$sql);
    $rows2=mysqli_num_rows($query);
        if($rows2>0){
            $next_answer= mysqli_fetch_array($query);
            $next_answer=$next_answer['stuAnswer'];
            $_SESSION['nextAnswer']=$next_answer;
        }
    

    
}
}else{
    
    if(isset($_POST['pre'])){
        $page=$_SESSION['page'];
    $page=$page-1;
    $_SESSION['page']=$page;
    if(isset($_GET['pqId'])){
       
        $pqId=$_GET['pqId'];
        $sql="SELECT stuAnswer FROM stuanswers WHERE eId='$eId' and qId='$pqId' and stuId='$stuId'";
        $query=mysqli_query($conn,$sql);
        $rows1=mysqli_num_rows($query);
        if($rows1>0){
            $pre_answer= mysqli_fetch_array($query);
            $pre_answer=$pre_answer['stuAnswer'];
            $_SESSION['preAnswer']=$pre_answer;
        }
       
    }
    }
}



$stuAnswer=trim($stuAnswer);
$sql1="SELECT * FROM stuanswers WHERE eId='$eId' and qId='$qId' and stuId='$stuId'";
$result=mysqli_query($conn,$sql1);
$rows=mysqli_num_rows($result);
if($rows==0){
    $sql2="INSERT INTO stuanswers(stuId, qId, eId, stuAnswer )
    VALUES ('$stuId','$qId','$eId','$stuAnswer')";
}else{
    $sql2="UPDATE stuanswers SET stuAnswer='$stuAnswer' WHERE stuId='$stuId' and eId='$eId' and qId='$qId'";
}



 if(mysqli_query($conn, $sql2)){
     header("location: ../student/startExam.php?page=$page");
 }