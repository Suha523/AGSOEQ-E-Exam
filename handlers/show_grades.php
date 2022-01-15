
<?php
session_start();
if(isset($_SESSION['tId'])){
    $eId=$_SESSION['eId'];
    $sql="SELECT * FROM students JOIN marks ON students.stuId=marks.stuId JOIN exams ON marks.eId=exams.eId WHERE exams.eId='$eId'";
    $query=mysqli_query($conn, $sql);
}else{
    if(isset($_SESSION['stuId'])){
        $subId=$_SESSION['subId'];
        $stuId=$_SESSION['stuId'];
        $sql="SELECT * FROM students JOIN marks ON students.stuId=marks.stuId JOIN exams ON marks.eId=exams.eId WHERE exams.subId='$subId' and students.stuId='$stuId'";
        $query=mysqli_query($conn, $sql);
        $grades=mysqli_fetch_all($query);
    }
   
}
?> 

