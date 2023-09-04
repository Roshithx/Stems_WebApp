<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Add']))
{
    $id=$_GET['id'];
    $Course_name=$_POST['Course_name'];
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];
    $query="update subject_tb set Course_name='$Course_name',semester='$semester',subject='$subject' where id=$id";    
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        header('location:subjectadd.php');
    }
}
?>