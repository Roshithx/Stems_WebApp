<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Add']))
{
    $id=$_GET['id'];
    $Department_name=$_POST['Department_name'];
        $query="update department_tb set Department_name='$Department_name' where id=$id";    
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        header('location:departmentadd.php');
    }
}
?>