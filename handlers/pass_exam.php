
<?php
session_start();
$_SESSION['eId']=$_GET['eId'];
$_SESSION['eName']=$_GET['eName'];
$_SESSION['eDate']=$_GET['eDate'];
$_SESSION['eStartT']=$_GET['eStartT'];
$_SESSION['eEndT']=$_GET['eEndT'];
$_SESSION['totalMark']=$_GET['totalMark'];
$type=$_GET['type'];
if($type=="add"){
    header("location: ../teacher/addQuestion.php");
}else{
    if($type=="show"){
        header("location: ../teacher/showQuestions.php");
    }else{
        if($type=="edit"){
            header("location: ../teacher/updateExam.php");
        }else{
            header("location: ../showGrades.php");
        }
        
    }
    
}

?> 

