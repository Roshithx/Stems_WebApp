<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Add']))
{
    $Department_name=$_POST['Department_name'];
    $query="insert into department_tb(Department_name)values('$Department_name')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        header('location:departmentadd.php');
    }
}
?>