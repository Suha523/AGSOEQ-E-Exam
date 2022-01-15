<?php
session_start();
include("connectDB.php");
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $mark=$_POST['mark'];
    $eId=$_SESSION['eId'];
    
    if($question!="" && $answer!="" && $mark!="" ){
    $sql="INSERT INTO questions(qText, qAnswer, qNummark, eId) 
    VALUES ('$question','$answer','$mark','$eId')";
    if(mysqli_query($conn,$sql)){
        $_SESSION['question']=$question;
        $_SESSION['answer']=$answer;
        $_SESSION['mark']=$mark;
            $_SESSION['success']="The Question Added Successfly";
            header("location: ../teacher/addQuestion.php");   
        
    }

}else{
    $_SESSION['error']="Please Fill All Fields";
    header("location: ../teacher/addQuestion.php");
}
?>

