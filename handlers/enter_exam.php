<?php

session_start();
$eId=$_GET['eId'];
$eName=$_GET['eName'];
$eDate=$_GET['eDate'];
$sTime=$_GET['sTime'];
$eTime=$_GET['eTime'];
// echo date("Y-m-d").'</br>';
// echo $eDate.'</br>';
// $date=date_create($sTime);
// echo date_format($date,"r").'</br>';
// echo $sTime.'</br>';
// echo $eTime.'</br>';

// $timezone = date_default_timezone_get();
// date_default_timezone_set("$timezone");
// echo "The time is " . date("G:i:s").'</br>';
// echo date("l").'</br>';
// $eDate=(date("Y/m/d",$eDate);
if(date("Y-m-d") < $eDate || date("Y-m-d") > $eDate || (date("Y-m-d")==$eDate && date("G:i:s") < $sTime )|| (date("Y-m-d")==$eDate && date("G:i:s") > $eTime )||$_SESSION['state']==2){
    
    // $sdate=date_create($sTime);
    // $edate=date_create($eTime);
    // date_default_timezone_get(); 
    $_SESSION['eName']=$eName;
    $_SESSION['eDate']=$eDate;
    $_SESSION['sTime']= $sTime;
    $_SESSION['eTime']=$eTime;
    $_SESSION['day']=date('D', strtotime($eDate));
    $_SESSION['limit']=date("G:i:sa",strtotime($eTime)) - date("G:i:sa",strtotime($sTime));
    header("location: ../student/beforeExam.php");
}else{
    $_SESSION['eName']=$eName;
    $_SESSION['eId']=$eId;
    $_SESSION['date']=$eDate;
    $_SESSION['etime']=$eTime;
    $_SESSION['stime']= $sTime;
    header("location: ../student/enterExam.php");
}
// if(date()){

// }
