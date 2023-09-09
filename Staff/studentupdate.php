<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Register']))
{
    $filename=$_FILES['images']['name'];
    $filepath=$_FILES['images']['tmp_name'];
    $id=$_GET['id'];
    $name=$_POST['name'];
    $Regno=$_POST['Regno'];
    $department=$_POST['department'];
    $course=$_POST['Course_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($filename)
    {
    $query="update student_tb set name='$name',Regno='$Regno',department='$department',course='$course',username='$username',password='$password',images='$filename' where id=$id";
    }
    else{
        $query="update student_tb set name='$name',Regno='$Regno',department='$department',course='$course',username='$username',password='$password' where id=$id";
    }
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        move_uploaded_file($filepath,'../Images/'.$filename);
        header('location:studentview.php');
    }
}
?>