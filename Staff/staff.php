<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Register']))
{
    $name=$_POST['name'];
    $department=$_POST['department'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="insert into staff_tb(name,department,username,password)values('$name','$department','$username','$password')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        echo "Inserted Successfully";
    }
}
?>