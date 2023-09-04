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
    $department=$_POST['department'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    if($filename){
        $query="update staff_tb set name='$name',department='$department',username='$username',password='$password',email='$email',contact='$contact',images='$filename' where id=$id";
    }
    else
    {
        $query="update staff_tb set name='$name',department='$department',username='$username',password='$password',email='$email',contact='$contact' where id=$id";
    }    
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        move_uploaded_file($filepath,'../Images/'.$filename);
        header('location:staffview.php');
    }
}
?>