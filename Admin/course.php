<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Add']))
{
    $Course_name=$_POST['Course_name'];
    $Department_name=$_POST['Department_name'];
    $query="insert into Course_tb(Course_name,Department_name)values('$Course_name','$Department_name')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        header('location:courseadd.php');
    }
}
?>