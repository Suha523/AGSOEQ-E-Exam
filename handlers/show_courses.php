<?php
session_start();
if (isset($_SESSION['tId'])){
    $tid=$_SESSION['tId'];
    $sql= "SELECT * FROM subjects WHERE tId='$tid'";
    $query = mysqli_query($conn, $sql);
    
}else{
    if (isset($_SESSION['stuId'])){
        $sid=$_SESSION['stuId'];
        $sql= "SELECT * FROM  stusubjects JOIN subjects WHERE stusubjects.subId= subjects.subId AND stuId='$sid'";
        $query = mysqli_query($conn, $sql);
    }
}

