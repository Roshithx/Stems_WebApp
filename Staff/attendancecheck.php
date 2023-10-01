<?php
include('../connection.php');
$course=$_POST['course'];
$Year=$_POST['Year'];
$date=$_POST['date'];
$e="select *,student_tb.id as sid from student_tb inner join course_tb on student_tb.course=course_tb.id where Year='$Year' and course='$course'";
$c=mysqli_query($con,$e);
$arr=[];
if(isset($_POST['period1'])){
    $present=$_POST['p1'];
    $period="period 1"; 
}
if(isset($_POST['period2'])){
    $present=$_POST['p2'];
    $period="period 2"; 
}
if(isset($_POST['period3'])){
    $present=$_POST['p3'];
    $period="period 3"; 
}
if(isset($_POST['period4'])){
    $present=$_POST['p4'];
    $period="period 4"; 
}
if(isset($_POST['period5'])){
    $present=$_POST['p5'];
    $period="period 5"; 
}
while($s=mysqli_fetch_assoc($c)){
    array_push($arr,$s["sid"]);
}
$ab=array_diff($arr,$present);
foreach($present as $p){
    $v="insert into present_tb(student_id,period,date)values($p,'$period','$date')";
    $ca=mysqli_query($con,$v);
}
foreach($ab as $a){
    $m="insert into absent_tb(student_id,period,date)values($a,'$period','$date')";
    $ma=mysqli_query($con,$m);
}