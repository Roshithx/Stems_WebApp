<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Register']))
{
    $id=$_GET['id'];
    $studentname=$_POST['studentname'];
    $parentname=$_POST['parentname'];
    $department=$_POST['department'];
    $course=$_POST['course'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $query="update parent_tb set studentname='$studentname',parentname='$parentname',department='$department',course='$course',username='$username',password='$password',contact='$contact' where id=$id";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        // echo "Updated Successfully";
        header('location:parentview.php');
    }
}
?>